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
use AdminSection;
use App\UserImage;
/**
 * Class Users
 *
 * @property \App\User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Gallery extends Section implements Initializable 
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
    protected $title='Галлерея';

    /**
     * @var string
     */
    protected $alias="gallery";

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
              AdminColumn::image('src', 'Фото'),
              AdminColumn::text('description', 'Описание'),
          ])->setHtmlAttribute('class', 'text-center')->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        //dd(User::comments());
        $form = AdminForm::panel()->addBody([
            AdminColumn::image('src', 'Фото'),
            AdminFormElement::text('description', 'Описание'),    
        ]);

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($form,"Описание");
        $tab2 = AdminSection::getModel(\App\Model\ImageComment::class)->fireDisplay();
        $tab2->getScopes($id)->push(['WithImage', $id]);
        $tabs->appendTab($tab2,"Комментарии");
        return $tabs;
    }

    /**
     * @return FormInterface
     */
    // public function onCreate()
    // {
    //     //return $this->onEdit(null);
    // }

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
