<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'teacher_id',
        'subject_id',
        'reservation_date',
        'start_time',
        'end_time',
        'status',
        'description',
        'student_count',
        'recurrence'
    ];

    protected $casts = [
        'reservation_date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    // Relación con aula
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    // Relación con docente
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // Relación con materia
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // Scope para reservas del día actual
    public function scopeToday($query)
    {
        return $query->whereDate('reservation_date', today());
    }

    // Scope para reservas confirmadas
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmada');
    }

    // Verificar conflictos de horario
    public function hasTimeConflict()
    {
        return self::where('classroom_id', $this->classroom_id)
            ->where('reservation_date', $this->reservation_date)
            ->where('id', '!=', $this->id ?? 0)
            ->where(function ($query) {
                $query->whereBetween('start_time', [$this->start_time, $this->end_time])
                    ->orWhereBetween('end_time', [$this->start_time, $this->end_time])
                    ->orWhere(function ($query) {
                        $query->where('start_time', '<=', $this->start_time)
                            ->where('end_time', '>=', $this->end_time);
                    });
            })
            ->exists();
    }
}