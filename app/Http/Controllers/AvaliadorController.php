<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliacao;
use App\Models\TCC;
use App\Models\Curso;
use Illuminate\Support\Facades\Session;


class AvaliadorController extends Controller
{
    public function salvar(Request $request)
	{
		$form = $request->all();
		$avaliacao = new Avaliacao;
		$avaliacao->id_tcc =$form["TCC"];
		$avaliacao->nome= $form["nome"];
		$avaliacao->id_curso= $form["curso"];
		$avaliacao->modulo= $form["modulo"];
		$avaliacao->apresentacao= $form["apresentacao"];
		$avaliacao->stand= $form["stand"];
		$avaliacao->pratico= @$form["pratico"];
		$avaliacao->viavel= @$form["viavel"];
		$avaliacao->favoravel= @$form["benefico"];
		$avaliacao->tecnologico= @$form["tecnologico"];
		$avaliacao->pontos_fortes= @$form["ponto_posit"];
		$avaliacao->incompleto= @$form["incompleto"];
		$avaliacao->inviavel= @$form["inviavel"];
		$avaliacao->caro= @$form["caro"];
		$avaliacao->pontos_fracos= @$form["ponto_neg"];
		$avaliacao->inclusivo= $form["acessibilidade"];
		$avaliacao->sustentavel= @$form["sustentavel"];
		$avaliacao->startup= @$form["startup"];
		$avaliacao->comunicacao= $form["men_oral"];
		$avaliacao->escrita= $form["men_esc"];
		$avaliacao->avaliacao= $form["mencao"];
		$avaliacao->coment_tcc= @$form["coment_TCC"];
		$avaliacao->coment_mostra= @$form["coment_feira"];
		$avaliacao->save();
		return view('enviado');
	}

	public function selecao(Request $request)
	{
		$avaliacoes = Avaliacao::all();
		$cursos = Curso::all();
		$TCCs= TCC::all();

		return view('selecao', [
			'TCCs' => $TCCs,
			'cursos' => $cursos,
		]);
		
		
	}

	public function resultado(Request $request)
	{
		$id=$request->input('id');
		$TCC=TCC::find($id);
		return view('resultado',
	[
		'TCC'=>$TCC,
	]);
		
	}

    public function avaliarView()
	{
		$avaliacoes = Avaliacao::all();
		$cursos = Curso::all();
		$TCCs= TCC::all();

		return view('avaliacao-aluno', [
			'TCCs' => $TCCs,
			'cursos' => $cursos,
		]);
	}

}