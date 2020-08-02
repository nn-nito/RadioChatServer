<?php

namespace App\Admin\Controllers;

use App\Radio;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RadioController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Radio';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Radio());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('room_id', __('Room id'));
        $grid->column('same_id', __('Same id'));
        $grid->column('title', __('Title'));
        $grid->column('title_kana', __('Title kana'));
        $grid->column('body', __('Body'));
        $grid->column('day_of_week', __('Day of week'));
        $grid->column('performer', __('Performer'));
        $grid->column('radio_station_id', __('Radio station id'));
        $grid->column('on_air_start_time', __('On air start time'));
        $grid->column('on_air_end_time', __('On air end time'));
        $grid->column('is_main_air', __('Is main air'));
        $grid->column('display_order', __('Display order'));
        $grid->column('is_irregular', __('Is irregular'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Radio::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('room_id', __('Room id'));
        $show->field('same_id', __('Same id'));
        $show->field('title', __('Title'));
        $show->field('title_kana', __('Title kana'));
        $show->field('body', __('Body'));
        $show->field('day_of_week', __('Day of week'));
        $show->field('performer', __('Performer'));
        $show->field('radio_station_id', __('Radio station id'));
        $show->field('on_air_start_time', __('On air start time'));
        $show->field('on_air_end_time', __('On air end time'));
        $show->field('is_main_air', __('Is main air'));
        $show->field('display_order', __('Display order'));
        $show->field('is_irregular', __('Is irregular'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Radio());

        $form->number('room_id', __('Room id'));
        $form->number('same_id', __('Same id'));
        $form->text('title', __('Title'));
        $form->text('title_kana', __('Title kana'));
        $form->text('body', __('Body'));
        $form->number('day_of_week', __('Day of week'));
        $form->text('performer', __('Performer'));
        $form->number('radio_station_id', __('Radio station id'));
        $form->time('on_air_start_time', __('On air start time'))->default(date('H:i:s'));
        $form->time('on_air_end_time', __('On air end time'))->default(date('H:i:s'));
        $form->switch('is_main_air', __('Is main air'));
        $form->number('display_order', __('Display order'));
        $form->switch('is_irregular', __('Is irregular'));

        return $form;
    }
}
