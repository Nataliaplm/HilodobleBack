<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
         'name' => 'José',
         'surname' => 'Gómez Gutierrez',
         'email' => 'j.gomez@hilodoble.com',
         'phone' => '666123456',
         'city' => 'Málaga',
         'address' => 'Calle hilodoble, número 7',
         'postcode' => '29010',
         'isAdmin' => true
        ]);

        User::factory()->create([
         'name' => 'Fem',
         'surname' => 'Coder',
         'email' => 'femcoder@hilodoble.com',
         'phone' => '666123456',
         'city' => 'Málaga',
         'address' => 'Calle hilodoble, número 7',
         'postcode' => '29010',
         'isAdmin' => false
        ]);

        User::factory(5)->create();

        Item::factory()->create([
            'itemName'=> 'Riñonera de lona reciclada',
            'category'=>'bolsos',
            'description'=>'Riñonera realizada con lona reciclada. Bolsillo posterior, cremallera y correa ajustable.',
            'image'=>'https://hilodoble.com/wp-content/uploads/2021/06/rinonera_colorful_1-scaled.jpg',
            'stockQuantity'=>'1',
            'purchaseQuantity'=>'1',
            'price'=>'14.90']);

        Item::factory()->create([
            'itemName'=> 'Monedero de cámara de bicicleta',
            'category'=>'accesorios',
            'description'=>'Monedero realizado con cámara de bicicleta. Cierre de cremallera y bolsillo frontal también de cremallera. Un monedero que te durará toda la vida',
            'image'=>'https://hilodoble.com/wp-content/uploads/2021/06/monedorogoma_1-300x300.jpg',
            'stockQuantity'=>'1',
            'purchaseQuantity'=>'1',
            'price'=>'12.90']);

        Item::factory()->create([
            'itemName'=> 'Maletín portátil de lona reciclada',
            'category'=>'material oficina',
            'description'=>'Maletín portátil de lona reciclada. Dos asas para mano. Forrado de foam. Proteja su dispositivo con esta resistente y original funda.',
            'image'=>'https://hilodoble.com/wp-content/uploads/2021/06/IMG_20210520_130855-300x300.jpg',
            'stockQuantity'=>'1',
            'purchaseQuantity'=>'1',
            'price'=>'19.90']);

        Item::factory()->create([
            'itemName'=> 'Bolsa de viaje de lona reciclada.',
            'category'=>'bolsos',
            'description'=>'Bolsa de viaje de lona reciclada. Gran capacidad y muy resistente.',
            'image'=>'https://hilodoble.com/wp-content/uploads/2021/06/bolsaviaje_museum_3-scaled.jpg',
            'stockQuantity'=>'1',
            'purchaseQuantity'=>'1',
            'price'=>'39.90']);

        Item::factory()->create([
            'itemName'=> 'Bandolera horizontal de lona reciclada',
            'category'=>'bolsos',
            'description'=>'Bandolera horizontal de lona reciclada para llevar tus documentos.',
            'image'=>'https://hilodoble.com/wp-content/uploads/2021/06/Bandolerahorizontal_time_1.jpg',
            'stockQuantity'=>'1',
            'purchaseQuantity'=>'1',
            'price'=>'24.90']);

        Item::factory()->create([
            'itemName'=> 'Maletín Grande de Lona Reciclada',
            'category'=>'bolsos',
            'description'=>'Maletín Grande de Lona Reciclada confeccionado con banderolas publicitarias de gran colorido con cierre en clip.',
            'image'=>'https://hilodoble.com/wp-content/uploads/2020/12/maletin-grande-scaled.jpg',
            'stockQuantity'=>'1',
            'purchaseQuantity'=>'1',
            'price'=>'29.90']);

        Item::factory()->create([
            'itemName'=> 'Funda tablet/ipad',
            'category'=>'material oficina',
            'description'=>'Funda tablet/ipad de lona reciclada. Gran capacidad y muy resistente.',
            'image'=>'https://hilodoble.com/wp-content/uploads/2021/06/fundaipad_fuego_1-scaled.jpg',
            'stockQuantity'=>'1',
            'purchaseQuantity'=>'1',
            'price'=>'14.90']);

        Item::factory()->create([
            'itemName'=> 'Alforja simple de lona reciclada',
            'category'=>'bolsos',
            'description'=>'Alforja simple de lona reciclada para bicicleta. Gran capacidad y muy resistente.',
            'image'=>'https://hilodoble.com/wp-content/uploads/2021/06/Alforjasimple_happy_3-scaled.jpg',
            'stockQuantity'=>'1',
            'purchaseQuantity'=>'1',
            'price'=>'32.90']);
        
        Item::factory()->create([
            'itemName'=> 'Agenda de Lona Reciclada',
            'category'=>'accesorios',
            'description'=>'Agenda de Lona Reciclada año 2022-2023. Agenda formato A5 con distribución de página por día cubierta por lona publicitaria de pvc reciclado de la ciudad de Málaga.',
            'image'=>'https://hilodoble.com/wp-content/uploads/2021/03/Agenda_cine_1-scaled.jpg',
            'stockQuantity'=>'1',
            'purchaseQuantity'=>'1',
            'price'=>'12.90']);

        Item::factory()->create([
            'itemName'=> 'Bolsa Mini de Lona Reciclada',
            'category'=>'bolsos',
            'description'=>'Bolsa mini realizada con lona reciclada de banderolas publicitarias con doble asa.',
            'image'=>'https://hilodoble.com/wp-content/uploads/2021/03/Bolsamini_Fancine_1-scaled.jpg',
            'stockQuantity'=>'1',
            'purchaseQuantity'=>'1',
            'price'=>'14.90']);

        Item::factory()->create([
            'itemName'=> 'Bolso Ariana de Lona Reciclada',
            'category'=>'bolsos',
            'description'=>'Bolso bandolera ajustable realizado con lona reciclada. Cierre de solapa con clip imantado y apliques decorativos en los laterales de cámara de bicicleta reciclada.',
            'image'=>'https://hilodoble.com/wp-content/uploads/2020/11/bolso-ariana-1-scaled.jpg',
            'stockQuantity'=>'1',
            'purchaseQuantity'=>'1',
            'price'=>'29.90']);

        Item::factory()->create([
            'itemName'=> 'Alforjas de Lona Reciclada',
            'category'=>'bolsos',
            'description'=>'Alforjas dobles para bicicleta de formato universal. Realizada con banderolas publicitarias de Málaga. Impermeable con asa central reforzada de nylon y detalle hecho con cámara de bicicleta reciclada.',
            'image'=>'https://hilodoble.com/wp-content/uploads/2021/03/Alforja_Colores_3-scaled.jpg',
            'stockQuantity'=>'1',
            'purchaseQuantity'=>'1',
            'price'=>'39.90']);
    
/*         Item::factory(3)->create();
 */

    }
}
