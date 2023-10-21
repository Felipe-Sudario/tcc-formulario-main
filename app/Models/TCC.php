<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class TCC extends Model
{
    use HasFactory;
    protected $table = 'tcc';

    public function avaliacoes(): HasMany
    {
        return $this->hasMany(Avaliacao::class, 'id_tcc');
        
    }

    public function avaliacoes_prof(): HasMany
    {
        return $this->hasMany(Aval_Prof::class, 'id_tcc');
        
    }

    public function porcentagemInclusivo() {
        return round($this->avaliacoes->where("inclusivo", "=", 1)->count() / $this->avaliacoes->count() *100,1);
    }

    public function porcentagemSustentabilidade() {
        return round($this->avaliacoes->where("sustentavel", "=", 1)->count() / $this->avaliacoes->count()*100,1);
    }

    public function porcentagemStartup(){
        return round($this->avaliacoes->where("startup", "=", 1)->count() / $this->avaliacoes->count()*100,1);
    }

    public function porcentagemPratico(){
        return round($this->avaliacoes->where("pratico", "=", 1)->count() / $this->avaliacoes->count()*100,1);
    }

    public function porcentagemViavel(){
        return round($this->avaliacoes->where("viavel", "=", 1)->count() / $this->avaliacoes->count()*100,1);
    }

    public function porcentagemBenefico(){
        return round($this->avaliacoes->where("benefico", "=", 1)->count() / $this->avaliacoes->count()*100,1);
    }

    public function porcentagemTecnologico(){
        return round($this->avaliacoes->where("tecnologico", "=", 1)->count() / $this->avaliacoes->count()*100,1);
    }
}
