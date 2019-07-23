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
use App\ImageComment;
/**
 * Class Users
 *
 * @property \App\User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class CommentsImage extends Section implements Initializable 
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
    protected $title='Комментарии';

    /**
     * @var string
     */
    protected $alias="comments";

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
        return  AdminDisplay::table()->setColumns([AdminColumn::text('text', 'Комментарий'),])->setHtmlAttribute('class', 'text-center')->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    // public function onEdit($id)
    // {

    // }

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
