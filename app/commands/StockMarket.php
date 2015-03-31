<?php

use Indatus\Dispatcher\Scheduling\ScheduledCommand;
use Indatus\Dispatcher\Scheduling\Schedulable;
use Indatus\Dispatcher\Drivers\Cron\Scheduler;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class StockMarket extends ScheduledCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'stocks:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'This job basically fetches the stock updates from 
								http://www.matba.com.ar/xml/ajustes.xml 
								and stores them in the DB';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * When a command should run
	 *
	 * @param Scheduler $scheduler
	 * @return \Indatus\Dispatcher\Scheduling\Schedulable
	 */
	public function schedule(Schedulable $scheduler)
	{
		return $scheduler->everyWeekday()->hours(22);
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$stocks = simplexml_load_file('http://www.matba.com.ar/xml/ajustes.xml');
		
		foreach($stocks->children() as $stock){
			$stock_item = [];

			foreach($stock as $stock_key => $stock_value){

				if($stock_key == 'fecha'){
					$date = explode('/', $stock_value);
					// dd($date);
					$date_required_format = $date[2] . '-' . $date[1] . '-' . $date[0];
					$stock_item[$stock_key] = $date_required_format;
				}else{
					$stock_item[$stock_key] = $stock_value;
				}
				
			}

			Stock::create($stock_item);
		}
	}

}
