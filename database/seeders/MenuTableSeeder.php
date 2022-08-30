<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

<<<<<<< HEAD
        \DB::table('menu')->delete();
        
        \DB::table('menu')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => 'Nasi Goreng',
                'description' => 'Nasi yang digoreng menggunakan bumbu, ayam, dan telor',
                'ingredients' => 'Nasi, Telor, Ayam, Bumbu Special',
                'category_id' => 5,
                'price' => 20000,
                'image' => 'posImages/VtlLGPLy5ARnS8s6MfMwGdSblYUZ41KoO7ybFWNr.jpg',
=======

        DB::table('menu')->delete();

        DB::table('menu')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Ayam goreng',
                'description' => 'Ayam yang digoreng',
                'ingredients' => 'Gaada',
                'category' => NULL,
                'price' => 27000,
                'image' => NULL,
>>>>>>> be54ee40eb18ac1982142fca04e023899e37f0ae
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
<<<<<<< HEAD
            1 => 
            array (
                'id' => 5,
                'name' => 'Mie Goreng Chawaa',
                'description' => 'Mie yang direbus terlebih dahulu, lalu digoreng bersama telor, sosi dan sayuran',
                'ingredients' => 'Mie, Telor, Sosis, Sayuran',
                'category_id' => 5,
                'price' => 20000,
                'image' => 'posImages/4KjbQDk6bDhfviXIa1b6CYtgU9I9PRLDgtoXGalh.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'Nasi Ayam Katsu',
                'description' => 'Ayam Fillet yang diberi tepung roti lalu digoreng dengan metode deep fry. disajikan bersama nasi dan saus',
                'ingredients' => 'Ayam, Tepung Roti, Nasi',
                'category_id' => 5,
                'price' => 20000,
                'image' => 'posImages/FQC3s9o3OYJr0ILe1CVI7Ne1vtIyFS7VATVM1FEP.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'Ayam Geprek',
                'description' => 'Ayam yang diberi tepung lalu digoreng dengan metode deep fry lalu digeprek. disajikan dengan nasi dan sambal',
                'ingredients' => 'Ayam, Tepung, Nasi',
                'category_id' => 5,
                'price' => 20000,
                'image' => 'posImages/E6GEDEX855ciEFL50r7CgMzyZhGD6vjXe79MX9Bx.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'Indomie Rebus',
                'description' => 'Mie yang direbus bersama telor, sosis, sayuran. Lalu diberi bumbu indomie, dan diberi toping sosis',
                'ingredients' => 'Mie, Telor, Sosi, Sayuran',
                'category_id' => 5,
                'price' => 18000,
                'image' => 'posImages/04a8FRsZujshJFeqTunoLqvoXl9fgXlTHVZOjoWI.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 9,
                'name' => 'Jamur Crispy',
                'description' => 'Jamur yang diberi tepung dan digoreng dengan metode deep fry.',
                'ingredients' => 'Jamur, Tepung',
                'category_id' => 6,
                'price' => 15000,
                'image' => 'posImages/ghwoYT6SE5BOHP0x0lHfctpGJ69E5c3KEi95Iwrz.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 10,
                'name' => 'Tahu Cabe Garam',
                'description' => 'Tahu yang digoreng dengan metode deep fry. lalu diberi garam dan cabai',
                'ingredients' => 'Tahu, Cabai, dan Garam',
                'category_id' => 6,
                'price' => 15000,
                'image' => 'posImages/gztSczyqQWkM7nCoUdIKYzfWUREdewfXH0uACGth.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 11,
                'name' => 'Pisang Crispy',
                'description' => 'Pisang yang diberi tepung roti, lalu digoreng. lalu diberi toping susu kental manis, meses, dan keju.',
                'ingredients' => 'Pisang, keju, meses, tepung roti, susu kental manis',
                'category_id' => 6,
                'price' => 15000,
                'image' => 'posImages/vZTdTwAlJK7yYCMMcEXdkVDeRgLZoLCnAQzVhr5v.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => '2022-08-29 08:26:40',
            ),
            8 => 
            array (
                'id' => 12,
                'name' => 'Banana Keju',
                'description' => 'Pisang yang dibakar, lalu diberi toping keju, meses dan susu kental manis',
                'ingredients' => 'Pisang, keju, meses, susu kental manis',
                'category_id' => 6,
                'price' => 15000,
                'image' => 'posImages/tuvc3UcBmOD8WbyXqDG5uNQdBLpuFDM9sEFwcuxj.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 13,
                'name' => 'Cireng Bumbu',
                'description' => 'Cireng yang digoreng, lalu disajikan dengan bumbu spesial',
                'ingredients' => 'Cireng, Bumbu Special',
                'category_id' => 6,
                'price' => 15000,
                'image' => 'posImages/DAkpERv8OPvXa8uIpD8bKFz3U1q1GgZcRlenEzh9.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 14,
                'name' => 'French Fries',
                'description' => 'Kentang yang digoreng lalu diberi bumbu, dan disajikan bersama saus',
                'ingredients' => 'Kentang',
                'category_id' => 6,
                'price' => 17000,
                'image' => 'posImages/arrUnP6pZP8nuFsBf0H1xUPmO1ZTxFlov71MOZOk.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 15,
                'name' => 'Sausage and Fries',
                'description' => 'Kentang dan Sosis yang digoreng terlebih dahulu lalu diberikan bumbu, dan disajikan dengna saus.',
                'ingredients' => 'sosis, kentang',
                'category_id' => 6,
                'price' => 15000,
=======
            1 =>
            array(
                'id' => 2,
                'name' => 'Minuman Segar',
                'description' => 'Wowww segarr',
                'ingredients' => 'Air',
                'category' => NULL,
                'price' => 10000,
>>>>>>> be54ee40eb18ac1982142fca04e023899e37f0ae
                'image' => NULL,
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
<<<<<<< HEAD
            12 => 
            array (
                'id' => 16,
                'name' => 'Roti Bakar',
                'description' => 'Roti yang dibakar, lalu diberi toping keju, susu kental manis, dan meses',
                'ingredients' => 'Roti, keju, susu kental manis, meses',
                'category_id' => 6,
                'price' => 15000,
                'image' => 'posImages/noxvbjLgEGTDKYEyDI5KOz56673evir5Q1m3f6u1.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 17,
                'name' => 'Dimsum',
                'description' => 'Dimsum dimasak dengan cara dikukus lalu disajikan dengan kelakat',
                'ingredients' => 'Dimsum',
                'category_id' => 6,
                'price' => 15000,
=======
            2 =>
            array(
                'id' => 3,
                'name' => 'Rokok',
                'description' => 'Pembunuh massal.',
                'ingredients' => 'Racun',
                'category' => NULL,
                'price' => 49000,
>>>>>>> be54ee40eb18ac1982142fca04e023899e37f0ae
                'image' => NULL,
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 18,
                'name' => 'Chiken Strip',
                'description' => 'Ayam yang difillet lalu diberi tepung dan digoreng. disajikan bersama french fries dan sambal.',
                'ingredients' => 'Ayam, Tepung, Kentang, Sambal',
                'category_id' => 6,
                'price' => 20000,
                'image' => NULL,
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 19,
                'name' => 'Americano',
                'description' => 'Kopi Hitam yang berasal dari pemrosesan biji kopi',
                'ingredients' => 'Coffee House Blend',
                'category_id' => 7,
                'price' => 13000,
                'image' => 'posImages/LRUNN8Z59CjxaqbpODQFyGDrYKG1mneePhHyJ38c.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 20,
            'name' => 'Cappucino (Ice/Hot)',
                'description' => 'Espresso yang di campurkan dengan susu',
                'ingredients' => 'Espresso, Susu, Foam',
                'category_id' => 7,
                'price' => 20000,
                'image' => 'posImages/NnL8Eqh0jzGavZgu3cic0iaS47pG5fvClzmWg5eF.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => '2022-08-29 10:20:46',
            ),
            17 => 
            array (
                'id' => 21,
                'name' => 'Mochacino',
                'description' => 'Espresso yang dipadukan dengan cokelat dan susu',
                'ingredients' => 'Susu, Cokelat, Espresso',
                'category_id' => 7,
                'price' => 20000,
                'image' => 'posImages/lN44Bne8ILehW5jQbXaUyzSozGOSX5OIYdZbBj15.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 22,
                'name' => 'V60',
                'description' => 'Kopi dengan teknik penyeduhan yang lambat dengan tujuan untuk mengeluarkan aroma dari kopi,',
                'ingredients' => 'Coffee House Blend',
                'category_id' => 7,
                'price' => 20000,
                'image' => 'posImages/q0N6wkfN1CdcILzhmhBPzjUSmphoccpq7pqXT3a7.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 23,
                'name' => 'Vietnam Drip',
                'description' => 'Kopi dengan teknik tetes sangat cocok untuk kalian yang suka dengan perpaduan antara kopi dan susu kental manis',
                'ingredients' => 'Coffee House Blend',
                'category_id' => 7,
                'price' => 20000,
                'image' => 'posImages/IwDBT46DxKQLYOcxDsIWvqa5T08R4aHgMWzFbWP3.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 24,
                'name' => 'Japanese',
                'description' => 'Kopi yang diseduh dengan lambat dengan tujuan untuk mengeluarkan aroma kopi dengan tambahan es.',
                'ingredients' => 'Coffee House Blend',
                'category_id' => 7,
                'price' => 22000,
                'image' => 'posImages/g9YLymvHnDcIihFc8teRJ5NkHsATQhgEPyK8RZP8.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 25,
                'name' => 'Es Kopi Susu Chawaa',
                'description' => 'Es Kopi Susu Spesial Khas Chawaa',
                'ingredients' => 'Espresso, Susu, Susu Spesial',
                'category_id' => 7,
                'price' => 20000,
                'image' => 'posImages/aT0cauZOCG8dxKSKHTegJUcVV2G8kXKx3J23SwBr.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 26,
                'name' => 'Kopi Lemon Ice',
                'description' => 'Kopi yang dipadukan dengan lemon dan soda. lalu ditambah es biar segar',
                'ingredients' => 'Espresso, Lemon, Soda, Ice',
                'category_id' => 7,
                'price' => 20000,
                'image' => 'posImages/fdpVk9asIVe4rbwFwxx8JRWptPM5EwwHzeK1B6TI.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 27,
                'name' => 'Long Black',
                'description' => 'Espresso yang ditambah dengan air.',
                'ingredients' => 'Espresso, Water',
                'category_id' => 7,
                'price' => 15000,
                'image' => 'posImages/dMgfBtzrZTTE8jLaUOy3gMlr7VKZBLnrtUSpMdE1.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 28,
                'name' => 'Tea',
                'description' => 'Teh yang diberikan gula dan es',
                'ingredients' => 'Teh, Gula',
                'category_id' => 8,
                'price' => 7000,
                'image' => 'posImages/wKkdGjtVyLwHbE6TXLsdVt7DmyGb2P1i9QaxWIOy.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 29,
                'name' => 'Lychee Tea',
                'description' => 'Teh yang diberi gula dan prisa lychee dan disajikan dengan es biar segar',
                'ingredients' => 'Teh, Gula, Prisa Lychee',
                'category_id' => 8,
                'price' => 10000,
                'image' => 'posImages/DtiR6LhUBimuRNhvpRdKOJto3au4srcNQwPUsf2r.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 30,
                'name' => 'Lemon Tea',
                'description' => 'Teh yang dipadukan dengan lemon dan gula, lalu disajikan dengan es',
                'ingredients' => 'Teh, Air, Lemon, Gula',
                'category_id' => 8,
                'price' => 15000,
                'image' => 'posImages/38GZ2XvILPg3QKGRmXfPn74v6YkyWD69nJlrw3jN.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 31,
                'name' => 'Chocolate',
                'description' => 'Cokelat yang dipadukan dengan susu. diberikan es biar segar',
                'ingredients' => 'Susu, Cokelat Powder',
                'category_id' => 8,
                'price' => 20000,
                'image' => 'posImages/1GdJlISWTwfewE2yZfxyefoDh7I90nqJuTB1FF5W.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 32,
                'name' => 'Red Velvet',
                'description' => 'Susu yang dipadukan dengan red velvet. disajikan dengan es',
                'ingredients' => 'Susu, Red Velvet Powder',
                'category_id' => 8,
                'price' => 20000,
                'image' => 'posImages/W9oy3QOWENdq1ZABTWB2kLOUARkNB652a7kTrCMs.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 33,
                'name' => 'Matcha',
                'description' => 'Susu yang dipadukan dengan matcha. disajikan dengan es biar lebih segar',
                'ingredients' => 'Susu, Matcha Powder',
                'category_id' => 8,
                'price' => 20000,
                'image' => 'posImages/2AQtmgAHGD6XI0wLUQRhbCCNSdXHRny9ZcYc9Jiw.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 34,
                'name' => 'Yakult Booster',
                'description' => 'yakult yang dipadukan dengan syrup dan soda. disajikan dengan es',
                'ingredients' => 'Yakult, syrup, soda',
                'category_id' => 8,
                'price' => 18000,
                'image' => 'posImages/hmOBcn4FtPnxN7qRW54Npvw1zn6naB1gk9eaVK7t.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 35,
                'name' => 'Chocolate Hazelnut',
                'description' => 'Cokelat yang dipadukan dengan syrup hazelnut dan susu.',
                'ingredients' => 'Susu, Cokelat Powder, Syrup Hazelnut',
                'category_id' => 8,
                'price' => 20000,
                'image' => 'posImages/fevqQJlRONss3Ir5rRH4ccEdjHX2pxuFmh9c7Yxi.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => '2022-08-29 10:42:42',
            ),
            32 => 
            array (
                'id' => 36,
                'name' => 'Mojito',
                'description' => 'Minuman yang di sajikan dengan bahan bahan yang menyegarkan tenggorokan',
                'ingredients' => 'Syrup, Soda Ice, Lemon',
                'category_id' => 8,
                'price' => 20000,
                'image' => 'posImages/sG4DPnfCj7bCFC0afpnZEzIJ4o3831hnirMfN7n2.jpg',
                'is_hidden' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}