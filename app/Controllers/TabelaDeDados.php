<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\TabelaDeDadosModel;

class TabelaDeDados extends BaseController
{
    private $tabelaDeDadosModel;
	private $pastaImg;

    public function __construct()
    {
        $this->tabelaDeDadosModel = new TabelaDeDadosModel();
    }

    public function index()
    {
        return view('TabelaDeDados', [
            'dados' => $this->tabelaDeDadosModel->findAll()
        ]);
    }

    public function novoCadastro()
	{
		return view('formulario',[
			'acao' => 'TabelaDeDados/resultadoNovoCadastro',
			'titulo' => 'Insira seus dados'
		]);
	}

    public function delete($id)
	{
		//exclue imagem do servidor local
		$excluir = $this->tabelaDeDadosModel ->find($id);
		$ex = $excluir['img'];
		unlink($ex);

		if ($this->tabelaDeDadosModel->delete($id)) {
			echo view('menssagens', [
				'menssagens' => 'Usuário Excluído com Sucesso'
			]);
		} else {
			echo view('menssagens', [
				'menssagens' => 'Erro ao excluir usuario!'
			]);
		}
	}

	public function resultadoNovoCadastro()
	{
		//pega seta caminho da pasta + o nome do arquivo vindo do formulario + extencao da img + gera novo dome para a img
		$pastaImg = "assets/imgens/";
		$novoNomeImg = uniqid();
		$path = $pastaImg.$novoNomeImg;

		//tras os dados vindos pelos formulario
		$id = $this->request->getVar('id');
		$nome = $this->request->getVar('nome');
		$endereco = $this->request->getVar('endereco');
		$img = $this->request->getFile('img');

		if($this->tabelaDeDadosModel ->save([
			'nome' =>$nome,
			'endereco' => $endereco,
			'img' => $path 
			]))
		{
		$img->move($pastaImg, $novoNomeImg);
		echo view('menssagens', [
			'menssagens' => 'Cadastrado com sucesso!'
			]);
		}
		else
		{
			echo view('menssagens', [
				'menssagens' => 'Erro ao cadastrar novo usuario! Tente novamente!'
			]);
		}
	}

	public function editar($id)
	{
		$data = $this->tabelaDeDadosModel->find($id);
		
		return view('formulario', [
			'dado' => $data,
			'acao' => 'TabelaDeDados/edcaoCadastro',
			'titulo' => 'Altere seus dados'
			]);
	}

	public function edcaoCadastro(){
		//pega seta caminho da pasta + o nome do arquivo vindo do formulario + extencao da img + gera novo dome para a img		$pasta = "assets/imgens/";
		$pastaImg = "assets/imgens/";
		$novoNomeImg = uniqid();
		$path = $pastaImg.$novoNomeImg;

		//tras os dados vindos pelos formulario
		$id = $this->request->getVar('id');
		$nome = $this->request->getVar('nome');
		$endereco = $this->request->getVar('endereco');
		$img = $this->request->getFile('img');

		if(isset($id))
		{
			$excluir = $this->tabelaDeDadosModel ->find($id);
			$ex = $excluir['img'];
			unlink($ex);

			if($this->tabelaDeDadosModel ->update($id,[
				'nome' =>$nome,
				'endereco' => $endereco,
				'img' => $path                
				]))
			{
			$img->move($pastaImg, $novoNomeImg);
			echo view('menssagens', [
				'menssagens' => 'Cadastro atualizado com sucesso!'
			]);
			}
			else
			{
				echo view('menssagens', [
					'menssagens' => 'Erro ao atualizar os dados! Tente novamente!'
				]);
			}
		}
	}
}
