<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Personnel;
use Maatwebsite\Excel\Events\AfterSheet;


class personnelliste implements FromCollection
{
    public function collection()
    {
        return Personnel::select('nom','prenom','poste')->get();
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // $event->sheet->mergeCells('A1:B1'); // Fusionner les cellules A1 et B1
                $event->sheet->setCellValue('A1', 'Nom'); // Écrire "Nom" dans la cellule A1
                $event->sheet->setCellValue('B1', 'Prénom'); // Écrire "Prénom" dans la cellule C1
                $event->sheet->setCellValue('C1', 'poste'); // Écrire "Prénom" dans la cellule C1
            },
        ];
    }
}
