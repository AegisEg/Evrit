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
        return $form = AdminForm::panel()->addBody([
        AdminFormElement::date("created_at",'Дата создания'),
        AdminFormElement::checkbox("is_admin",'Администратор'),
        AdminFormElement::checkbox("is_verification",'Верифицирован'),
        AdminFormElement::text('name', 'Имя'),
        AdminFormElement::date('birthday', 'Дата рождения'),
        //AdminFormElement::select('profession', 'Профессия', array("В магазине"=>"В магазине","Нет в наличии"=>"Нет в наличии"))//->setOptions(array("В магазине"=>"В магазине","Нет в наличии"=>"Нет в наличии")),
        AdminFormElement::select("gender_id", 'Пол', User::$gender),
        AdminFormElement::select("orientation_id", 'В поисках', User::$orientation),
        AdminFormElement::select("soc_status_id", 'Статус', User::$soc_status),
        //AdminFormElement::select("target_id", 'В поисках', User::$target),
        AdminFormElement::select("availability", 'Доступен', User::$availability),
        AdminFormElement::select("body_type", 'Телосложение', User::$body_type),
        AdminFormElement::select("education", 'Образование', User::$education),
        AdminFormElement::select("color_hair", 'Цвет волос', User::$color_hair),
        AdminFormElement::select("color_eye", 'Цвет глаз', User::$color_eye),
        AdminFormElement::select("marital_status", 'Семейное положение', User::$marital_status),
        AdminFormElement::select("drink", 'Алкоголь', User::$drink),
        AdminFormElement::select("smoking", 'Курение', User::$smoking),
        AdminFormElement::select("you_drink", 'Алкоголь (партнер)', User::$drink),
        AdminFormElement::select("you_smoking", 'Курение (партнер)', User::$smoking),
        AdminFormElement::select("children", 'Дети', User::$children),
        AdminFormElement::select("income_level", 'Доход', User::$income_level),
        AdminFormElement::select("i_sponsor", 'Что я могу предложить', User::$i_sponsor),
        AdminFormElement::select("you_sponsor", 'Чего я ожидаю', User::$you_sponsor),
        AdminFormElement::select("relationship_goal", 'Цель знакомства', User::$relationship_goal),
        AdminFormElement::select('city_id', 'Категории', \App\Model\City::class)->setDisplay('name'),
        AdminFormElement::multiselect('hobbyRel', 'Хобби', \App\Model\Hobby::class)->setDisplay('name'),
        AdminFormElement::multiselect('languageRel', 'Языки', \App\Model\Language::class)->setDisplay('name'),
        AdminFormElement::select('profession', 'Профессия', \App\Model\Profession::class)->setDisplay('name'),
        AdminFormElement::select('religion', 'Религия', \App\Model\Religion::class)->setDisplay('name'),

        
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
