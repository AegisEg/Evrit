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
use App\User;

class Feedbacks extends Section implements Initializable 
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
    protected $title='Жалобы';

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
          ->with('user')          
          ->setHtmlAttribute('class', 'table-primary')
          ->setColumns([
              AdminColumn::text('user.name', 'Пользователь')
              ->setSearchCallback(function($column, $query, $search){
                if($column->getName()=='user.name')
                    $query->whereHas('user', function ($query) use ($search)
                    {
                        $query->where('name', 'like', "%$search%");
                            
                    });
            }),
              AdminColumn::link('url', 'Ссылка'),  
              AdminColumn::text('text', 'Жалоба'),            
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
            AdminFormElement::select('user_id', 'Пользователь',User::class)->setDisplay('name')->required(),
            AdminFormElement::text('url', 'Ссылка')->required(),
            AdminFormElement::text('text', 'Жалоба')->required(),
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
