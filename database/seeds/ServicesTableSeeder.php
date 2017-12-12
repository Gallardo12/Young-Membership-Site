<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$service1 = new Service();
		$service1->photo_id = 0;
		$service1->title = 'Entrega de Paquetes a Domicilio';
		$service1->slug = 'entrega-de-paquetes-a-domicilio';
		$service1->meta_title = 'Entrega de Paquetes a Domicilio';
		$service1->meta_desc = 'Entrega de Paquetes a Domicilio';
		$service1->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
		$service1->location = "Durango";
		$service1->cost = 4500;
		$service1->status = 0;
		$service1->save();

		$service2 = new Service();
		$service2->photo_id = 0;
		$service2->title = 'Reparación de Computadoras';
		$service2->slug = 'reparacion-de-computadoras';
		$service2->meta_title = 'Reparación de Computadoras';
		$service2->meta_desc = 'Reparación de Computadoras';
		$service2->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
		$service2->location = "Durango";
		$service2->cost = 300;
		$service2->status = 0;
		$service2->save();

		$service3 = new Service();
		$service3->photo_id = 0;
		$service3->title = 'Repartidor de Comida a Domicilio';
		$service3->slug = 'repartidor-de-comida-a-domicilio';
		$service3->meta_title = 'Repartidor de Comida a Domicilio';
		$service3->meta_desc = 'Repartidor de Comida a Domicilio';
		$service3->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
		$service3->location = "Zacatecas";
		$service3->cost = 200;
		$service3->status = 0;
		$service3->save();

		$service4 = new Service();
		$service4->photo_id = 0;
		$service4->title = 'Creación de Logotipos';
		$service4->slug = 'creacion-de-logotipos';
		$service4->meta_title = 'Creación de Logotipos';
		$service4->meta_desc = 'Creación de Logotipos';
		$service4->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
		$service4->location = "Durango";
		$service4->cost = 1000;
		$service4->status = 0;
		$service4->save();

		$service5 = new Service();
		$service5->photo_id = 0;
		$service5->title = 'Impresión de Playeras';
		$service5->slug = 'impresion-de-playeras';
		$service5->meta_title = 'Impresión de Playeras';
		$service5->meta_desc = 'Impresión de Playeras';
		$service5->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
		$service5->location = "Durango";
		$service5->cost = 350;
		$service5->status = 0;
		$service5->save();
	}
}
