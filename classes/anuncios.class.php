<?php
class Anuncios{

public function getMeusAnuncios(){
	global $pdo;

	$array = array();
	$sql = $pdo->prepare("SELECT *, 
		(select anuncio_imagens.url from anuncio_imagens where
		 anuncio_imagens.id_anuncio = anuncios.id limit 1) as url
		 FROM anuncios WHERE id_usuario = :id_usuario");
	$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
	$sql->execute();

	if($sql->rowCount() > 0){
		$array = $sql->fetchAll();
		}

		return $array;

	}

	public function addAnuncio($titulo, $categoria, $valor, $descricao, $status){
		global $pdo;

		$sql = $pdo->prepare("INSERT INTO anuncios SET id_usuario = :id_usuario, id_categoria = :id_categoria,
		                      titulo = :titulo, descricao = :descricao, valor = :valor, status = :status");
		$sql->bindValue(":titulo", $titulo);
		$sql->bindValue(":id_categoria", $categoria);
		$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":valor", $valor);
		$sql->bindValue(":status", $status);
		$sql->execute();

		$num = $sql->rowCount();
	}

}





?>