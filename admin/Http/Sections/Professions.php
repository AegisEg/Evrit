<?php

namespace Admin\Http\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminColumnEditable;
use SleepingOwl\Admin\Contracts\Initializable;


class Professions extends Section implements Initializable 
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
    protected $title='Профессии';

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
              AdminColumn::text('name', 'Профессия'),             
          ])->setHtmlAttribute('class', 'text-center')->setDisplaySearch(true)->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Профессия')->required(),
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
}
