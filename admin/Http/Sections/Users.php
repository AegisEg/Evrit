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
use AdminSection;

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
    protected $title = 'Пользователи';

    /**
     * @var string
     */
    protected $alias = "users";

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

        $form = AdminForm::panel()->addBody([
            AdminFormElement::date("created_at", 'Дата создания'),
            AdminFormElement::checkbox("is_admin", 'Администратор'),
            AdminFormElement::checkbox("is_verification", 'Верифицирован'),
            AdminFormElement::text('name', 'Имя'),
            AdminFormElement::number('height', 'Рост'),
            AdminFormElement::date('birthday', 'Дата рождения'),
            AdminFormElement::select("gender_id", 'Пол', User::$gender),
            AdminFormElement::select('city_id', 'Город', \App\Model\City::class)->setDisplay('name'),
            AdminFormElement::select("orientation_id", 'В поисках', User::$orientation),
            AdminFormElement::select("soc_status_id", 'Статус', User::$soc_status),
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
            AdminFormElement::multiselect('hobbyRel', 'Хобби', \App\Model\Hobby::class)->setDisplay('name'),
            AdminFormElement::multiselect('languageRel', 'Языки', \App\Model\Language::class)->setDisplay('name'),
            AdminFormElement::select('profession', 'Профессия', \App\Model\Profession::class)->setDisplay('name'),
            AdminFormElement::select('religion', 'Религия', \App\Model\Religion::class)->setDisplay('name'),
            AdminFormElement::textarea('description', 'О себе'),
            AdminFormElement::image('avatar', "Аватар")->setUploadPath(
                function (\Illuminate\Http\UploadedFile $file) use ($id) {
                    $user = User::where('id', $id)->first();
                    return 'storage/uploads/' . $user->email;
                }
            ),
        ]);
        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($form, "Профиль пользователя");
        $tab2 = AdminSection::getModel(\App\Model\UserImage::class)->fireDisplay();
        $tab2->getScopes()->push(['WithUser', $id]);
        $tabs->appendTab($tab2, "Галлерея");
        return $tabs;
    }

    /**
     * @return FormInterface
     */
    // public function onCreate()
    // {
    //     return $this->onEdit(null);
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
