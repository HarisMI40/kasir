<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facedes\Log;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Carbon\Carbon;

class backupDatabase extends Command
{
    // command yang akan kita panggil di php artisan nanti
	// ex: php artisan jalankan:backup-db


    protected $signature = 'jalankan:backup-db';

   // untuk menampilkan bantuan dari artisan command
    protected $description = 'Jalankan Proses Backup Database';

    // variable untuk proses dari Process::class symfony
    protected $process;


    public function __construct()
    {
        parent::__construct();

        // // Tanggal Backup
		// $hari_ini = today()->format('Y-m-d');

		// // Cek Folder backups di folder storage/app, jika tidak ada
		// // Buat folder backups
		// if(!is_dir(storage_path('backups'))) mkdir(storage_path('backups'));

		// // persiapkan perintah yang akan kita jalankan
		// $this->process = new Process(sprintf([
		// 	'mysqldump --compact --skip-comment -u%s -p%s %s > %s',
		// 	config('database.connections.mysql.username'),
		// 	config('database.connections.mysql.password'),
		// 	config('database.connections.mysql.database'),
		// 	storage_path("backups/{$hari_ini}.sql")
		// ]
		// ));

		// // jika kode ini di print, hasilnya akan :
		// // mysqldump --compact --skip-comment -u 
        // //root -proot mydb > storage/app/backups/2020-11-11.sql
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // // Jalankan perintah backup saat artisan command dipanggil
		// try{
		// 	$this->process->mustRun();
		// }catch(ProcessFailedException $e){
		// 	// Jika gagal, tulis dalam log file beserta 
		// 	// Penyebab kenapa Gagal.
		// 	Log::error('Proses Backup harian gagal', $e);
		// }


		$filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
  
        $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . storage_path() . "/app/backup/" . $filename;
  
        $returnVar = NULL;
        $output  = NULL;
  
        exec($command, $output, $returnVar);
    }
}
