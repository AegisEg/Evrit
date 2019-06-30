<?php

namespace Admin\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use AdminDisplay;
use AdminColumn;
use AdminForm;
use AdminFormElement;
use App\User;
/**
 * Class Users
 *
 * @property \App\User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Users extends Section implements Initializable 
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title='Пользователи';

    /**
     * @var string
     */
    protected $alias="users";

    public function initialize()
    {
        $page = \AdminNavigation::getPages()->findById('content');
            $page->addPage(
            $this->makePage(300)
        );
    }
    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()->setColumns([
              AdminColumn::text('name', 'Имя'),
          ])->setHtmlAttribute('class', 'text-center')->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        //dd(User::$gender);
        return $form = AdminForm::panel()
    ->addBody([
        AdminFormElement::text('name', 'Имя'),
        AdminFormElement::date('birthday', 'Дата рождения'),
        //AdminFormElement::select('profession', 'Профессия', array("В магазине"=>"В магазине","Нет в наличии"=>"Нет в наличии"))//->setOptions(array("В магазине"=>"В магазине","Нет в наличии"=>"Нет в наличии")),
        AdminFormElement::select("gender_id", 'Пол', User::$gender),
        //AdminFormElement::select("orientation_id", 'В поисках', User::$orientation),
        //AdminFormElement::select("soc_status_id", 'В поисках', User::$soc_status),
        //AdminFormElement::select("target_id", 'В поисках', User::$target),
    ]);

    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
