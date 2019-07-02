<?php

namespace Admin\Http\Sections;

use AdminColumn;
use AdminColumnEditable;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

class Areas extends Section implements Initializable
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
    protected $title = "Редактируемые области";
    /**
     * @var string
     */
    protected $alias;

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
      return AdminDisplay::datatables()
          ->setHtmlAttribute('class', 'table-primary')
          ->setColumns([
              AdminColumn::text('id', 'ID'),
              AdminColumn::text('code', 'Код'),
              AdminColumn::text('name', 'Название'),
              AdminColumnEditable::checkbox('active')->setLabel('Показывать'),
          ])->setHtmlAttribute('class', 'text-center')->setDisplaySearch(true)->paginate(50);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id, $scopes = [])
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('code', 'Код')->required(),
            AdminFormElement::text('name', 'Название'),
            AdminFormElement::wysiwyg('text', 'Контент'),
            AdminFormElement::checkbox('active')->setLabel('Отображение')->setDefaultValue(1),
        ])->setHtmlAttribute('enctype', 'multipart/form-data');
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
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
