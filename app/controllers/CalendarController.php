<?php

class CalendarController extends \BaseController {

	public function showCalendar()
	{
		$breadcrumbs = ['Home', 'Calendar'];
		return View::make('admin.calendar.index')
					->withBreadcrumbs($breadcrumbs);
	}


}
