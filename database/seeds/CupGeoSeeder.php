<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;


class CupGeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $dumpFile = 'cup_geo_seed_20201030';
        $path = base_path();
        $mySqlString = env('MYSQL_PATH', 'mysql') . ' --user=' . env('DB_USERNAME', '')
            . ' --password=' . env('DB_PASSWORD', '') . ' ' . env('DB_DATABASE', '')
            . ' < ./database/dump/'.$dumpFile.'.sql';

        $cmdArray = [
          $mySqlString => 'seed',
        ];


        foreach ($cmdArray as $cmd => $group) {

            $cmdArrayProcessed[] = $cmd;

            $process = new Process($cmd, $path);
            $process->setTimeout(null);
            $process->run();

// executes after the command finishes
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            $this->command->comment($process->getOutput());
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $this->command->comment('Tabelle geografice inizializzate (dump: '.$dumpFile.')');


    }
}
