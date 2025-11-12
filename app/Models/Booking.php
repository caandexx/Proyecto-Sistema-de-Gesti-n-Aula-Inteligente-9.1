<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'start_time',
        'end_time',
        'classroom_id',
        'subject_id',
        'teacher_id',
        'status',
        'attendees'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    // Relación con Classroom
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    // Relación con Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // Relación con Teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // Scope para reservas activas
    public function scopeActive($query)
    {
        return $query->where('status', 'confirmed');
    }

    // Scope para reservas de hoy
    public function scopeToday($query)
    {
        return $query->whereDate('date', today());
    }

    // Scope para reservas futuras
    public function scopeUpcoming($query)
    {
        return $query->whereDate('date', '>=', today());
    }

    // Accesor para el horario formateado
    public function getTimeRangeAttribute()
    {
        return $this->start_time . ' - ' . $this->end_time;
    }

    // Accesor para el estado con colores
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'confirmed' => 'success',
            'pending' => 'warning',
            'cancelled' => 'danger',
            default => 'secondary'
        };
    }
}
