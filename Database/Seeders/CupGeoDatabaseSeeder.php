<?php

namespace Modules\CupGeo\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class CupGeoDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $dumpFile = __DIR__ . '/../dump/cup_geo_seed_20201030.sql';
        $path = base_path();
        $mySqlString = env('MYSQL_PATH', 'mysql') . ' --user=' . env('DB_USERNAME', '')
            . ' --password=' . env('DB_PASSWORD', '') . ' ' . env('DB_DATABASE', '')
            . ' < ' . $dumpFile;

        $cmdArray = [
            $mySqlString => 'seed',
        ];


        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        DB::table('cup_geo_comuni')->whereNull('nazione_id')->update(['nazione_id' => 1]);


        $this->command->comment('Tabelle geografiche inizializzate (dump: '.$dumpFile.')');

        // $this->call("OthersTableSeeder");
    }
}
