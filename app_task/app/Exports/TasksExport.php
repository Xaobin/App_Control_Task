<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TasksExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Task::all();
        return auth()->user()->tasks()->get();
    }

    public function headings():array { //declarando o tipo de retorno
        return [
            'Task ID', 
            'Task', 
            'Limit Conclusion'
        ];			
    }

    public function map($linha):array {
        //Exporta somente estas informações
        //E não a tabela inteira
        return [ 
            $linha->id,
            $linha->task,
            date('d/m/Y', strtotime($linha->date_limit_conclusion))
        ];
    }
}
