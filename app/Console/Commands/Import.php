<?php

namespace App\Console\Commands;

use App\Models\Family;
use App\Models\Genus;
use App\Models\Plant;
use App\Models\Type;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plants:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $csvFile = Storage::path('ListePlantes.csv');
        $file_handle = fopen($csvFile, 'r');
        $delimiter = '|';
        while ($row = fgetcsv($file_handle, null, $delimiter)) {
            if ($row[0] == 'Nom latin') {
                continue;
            }
            $family = Family::firstOrCreate(['name' => $row[3]]);
            $genus = Genus::firstOrCreate(['name' => $row[4]]);
            $type = Type::firstOrCreate(['name' => $row[5]]);
            $data = [
                'latin_name' => $row[0],
                'french_name' => $row[1],
                'conservation_status' => $row[2],
                'family_id' => $family->id,
                'genus_id' => $genus->id,
                'type_id' => $type->id,
                'description' => $row[6],
                'ecological_role' => $row[7],
                'etymology' => $row[8],
                'english_name' => $row[9],
                'flowering_period' => $row[10],
                'fruiting_period' => $row[11],
                'habitat' => $row[12],
                'usages' => $row[13],
            ];
            Plant::create($data);
        }
    }
}
