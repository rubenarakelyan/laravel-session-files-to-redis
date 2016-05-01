<?php namespace RubenArakelyan\LaravelSessionFilesToRedis;

use Illuminate\Console\Command;

/**
 * Class TransferSessionFilesToRedisCommand
 * @package RubenArakelyan\LaravelSessionFilesToRedis
 */
class TransferSessionFilesToRedisCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'session:transfer-session-files-to-redis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transfer sessions from file storage to Redis.';


    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire() {
        $session_path = storage_path('framework/sessions');
        $directory = new \DirectoryIterator($session_path);
        
        foreach ($directory as $file) {
	        if ($file->isFile()) {
		        $file_name = $file->getFilename();
		        $file_contents = serialize(file_get_contents($file->getPathname()));
		        echo "*3\r\n$3\r\nSET\r\n$".(strlen($file_name) + 8)."\r\nlaravel:".$file_name."\r\n$".strlen($file_contents)."\r\n".$file_contents."\r\n";
	        }
        }
    }
} 
