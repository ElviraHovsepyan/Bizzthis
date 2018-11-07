<?php

use App\Category;
use Illuminate\Database\Seeder;

class DimensionsSeeder extends Seeder
{
    public const Dimensions_1 = ['Bygg','Skönhet','Flytt & Städ','Webb/IT','Tomt & Markarbeten','Arkitekt & Inredning','Ekonomi & Juridik','Event','Fritid'];

    public const Dimensions_2 = [
        ['parent' => 'Bygg', 'name' => 'Taklagärre'],
        ['parent' => 'Bygg', 'name' => 'VVS-Montör'],
        ['parent' => 'Bygg', 'name' => 'Elektriker'],
        ['parent' => 'Bygg', 'name' => 'Målare'],
        ['parent' => 'Bygg', 'name' => 'Spacklare'],
        ['parent' => 'Bygg', 'name' => 'Snickare'],
        ['parent' => 'Bygg', 'name' => 'Golvsättere'],
        ['parent' => 'Bygg', 'name' => 'Murare'],
        ['parent' => 'Bygg', 'name' => 'Svetsare'],
        ['parent' => 'Bygg', 'name' => 'Sotare'],
        ['parent' => 'Bygg', 'name' => 'Sanering'],
        ['parent' => 'Bygg', 'name' => 'Isolering'],
        ['parent' => 'Bygg', 'name' => 'Rörmokare'],

        ['parent' => 'Skönhet', 'name' => 'Frisörer'],
        ['parent' => 'Skönhet', 'name' => 'Rehabilitering'],
        ['parent' => 'Skönhet', 'name' => 'Massage'],

        ['parent' => 'Flytt & Städ', 'name' => 'Flytt'],
        ['parent' => 'Flytt & Städ', 'name' => 'Städning'],

        ['parent' => 'Webb/IT', 'name' => 'Webbdesign'],
        ['parent' => 'Webb/IT', 'name' => 'Webbutveckling'],

        ['parent' => 'Tomt & Markarbeten', 'name' => 'Asfaltering'],
        ['parent' => 'Tomt & Markarbeten', 'name' => 'Berg & Brunnsborrning'],
        ['parent' => 'Tomt & Markarbeten', 'name' => 'Dränering'],
        ['parent' => 'Tomt & Markarbeten', 'name' => 'Grundgjutning'],
        ['parent' => 'Tomt & Markarbeten', 'name' => 'Staket & Stängsel'],
        ['parent' => 'Tomt & Markarbeten', 'name' => 'Stensättning'],
        ['parent' => 'Tomt & Markarbeten', 'name' => 'Trädfällning '],
        ['parent' => 'Tomt & Markarbeten', 'name' => 'Trädgårdsdesign'],
        ['parent' => 'Tomt & Markarbeten', 'name' => 'Trädgårdsskötsel'],
        ['parent' => 'Tomt & Markarbeten', 'name' => 'Pool'],

        ['parent' => 'Arkitekt & Inredning', 'name' => 'Arkitekt'],
        ['parent' => 'Arkitekt & Inredning', 'name' => 'Inredning'],

        ['parent' => 'Ekonomi & Juridik', 'name' => 'Ekonomi'],
        ['parent' => 'Ekonomi & Juridik', 'name' => 'Juridik'],

        ['parent' => 'Event', 'name' => 'Eventplanerare '],
        ['parent' => 'Event', 'name' => 'Kock'],
        ['parent' => 'Event', 'name' => 'Servitris'],
        ['parent' => 'Event', 'name' => 'DJ'],
        ['parent' => 'Event', 'name' => 'Musiker'],

        ['parent' => 'Fritid', 'name' => 'Barnvakt'],
        ['parent' => 'Fritid', 'name' => 'Läxhjälp'],
        ['parent' => 'Fritid', 'name' => 'Hunddagis'],

    ];

    public const Dimensions_3 = [
        ['parent' => 'Frisörer', 'name' => 'Klippning'],
        ['parent' => 'Frisörer', 'name' => 'Färg'],

        ['parent' => 'Flytt', 'name' => 'Flytthjälp'],
        ['parent' => 'Flytt', 'name' => 'Gods- & Palltransport'],
        ['parent' => 'Flytt', 'name' => 'Kontorsflytt'],

        ['parent' => 'Städning', 'name' => 'Flyttstädning'],
        ['parent' => 'Städning', 'name' => 'Fönsterputsning'],
        ['parent' => 'Städning', 'name' => 'Dödsbostädning'],
        ['parent' => 'Städning', 'name' => 'Golvvård'],
        ['parent' => 'Städning', 'name' => 'Hemstädning'],
        ['parent' => 'Städning', 'name' => 'Kontor & Butiksstädning'],
        ['parent' => 'Städning', 'name' => 'Trapphusstädning'],

        ['parent' => 'Webbdesign', 'name' => 'Grafisk design'],

        ['parent' => 'Webbutveckling', 'name' => 'Webbplatsbyggare'],
        ['parent' => 'Webbutveckling', 'name' => 'Specialbyggd webbutveckling'],
        ['parent' => 'Webbutveckling', 'name' => 'Apputveckling'],
        ['parent' => 'Webbutveckling', 'name' => 'Windows applikation'],
        ['parent' => 'Webbutveckling', 'name' => 'Sökmotoroptimering'],

        ['parent' => 'Arkitekt', 'name' => 'Arkitektritning'],
        ['parent' => 'Arkitekt', 'name' => 'Bygglovsritning'],
        ['parent' => 'Arkitekt', 'name' => 'Konstruktionsritning'],

        ['parent' => 'Inredning', 'name' => 'Heminredning & styling'],
        ['parent' => 'Inredning', 'name' => 'Kontorsinredning'],

        ['parent' => 'Ekonomi', 'name' => 'Bokslut'],
        ['parent' => 'Ekonomi', 'name' => 'Deklaration'],
        ['parent' => 'Ekonomi', 'name' => 'Löpande bokföring'],
        ['parent' => 'Ekonomi', 'name' => 'Revision'],

        ['parent' => 'Juridik', 'name' => 'Affärsjuridik'],
        ['parent' => 'Juridik', 'name' => 'Bråttmålsjuridik'],
        ['parent' => 'Juridik', 'name' => 'Familjejuridik'],
    ];

    public const Dimensions_4 = [
        ['parent' => 'Grafisk design', 'name' => 'Webb & Mobile Design'],
        ['parent' => 'Grafisk design', 'name' => 'Logotyp'],
        ['parent' => 'Grafisk design', 'name' => 'Illustration'],
        ['parent' => 'Grafisk design', 'name' => '3D-modeller och produktdesign'],
        ['parent' => 'Grafisk design', 'name' => 'Informationsgrafik'],
        ['parent' => 'Grafisk design', 'name' => 'Broschyrer'],
        ['parent' => 'Grafisk design', 'name' => 'Paketering design'],

        ['parent' => 'Webbplatsbyggare', 'name' => 'WordPress'],
        ['parent' => 'Webbplatsbyggare', 'name' => 'Wix'],
        ['parent' => 'Webbplatsbyggare', 'name' => 'Shopify'],

        ['parent' => 'Apputveckling', 'name' => 'Android'],
        ['parent' => 'Apputveckling', 'name' => 'IOS'],
    ];

    public const Dimensions_5 = [
        ['parent' => 'Webb & Mobile Design', 'name' => 'Användargränssnitt'],
        ['parent' => 'Webb & Mobile Design', 'name' => 'Wireframe (UX)'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createFirstDimensions();
        $this->createSecondDimensions();
        $this->createThirdDimensions();
        $this->createForthDimensions();
        $this->createFifthDimensions();
    }

    public function createFirstDimensions(){
        foreach (self::Dimensions_1 as $dimension){
            $dimention = new Category();
            $dimention->name = $dimension;
            $dimention->dimension_level = 1;
            $dimention->save();
        }
    }

    public function createSecondDimensions(){
        $first_dimensions = Category::where('dimension_level', 1)->get();
        foreach ($first_dimensions as $first_dimension){
            $second_dimensions = $this->getSubDimensionName($first_dimension->name, self::Dimensions_2);
            foreach ($second_dimensions as $second_dimension){
                $dimention = new Category();
                $dimention->name = $second_dimension;
                $dimention->dimension_level = 2;
                $dimention->parent = $first_dimension->id;
                $dimention->save();
            }
        }
    }

    public function createThirdDimensions(){
        $second_dimensions = Category::where('dimension_level',2)->get();
        foreach ($second_dimensions as $second_dimension){
            $thirdDimensions = $this->getSubDimensionName($second_dimension->name, self::Dimensions_3);
            foreach ($thirdDimensions as $thirdDimension){
                $dim = new Category();
                $dim->name = $thirdDimension;
                $dim->dimension_level = 3;
                $dim->parent = $second_dimension->id;
                $dim->save();
            }
        }
    }

    public function createForthDimensions(){
        $thirdDimensions = Category::where('dimension_level',3)->get();
        foreach ($thirdDimensions as $thirdDimension){
            $forthDimensions = $this->getSubDimensionName($thirdDimension->name, self::Dimensions_4);
            foreach ($forthDimensions as $forthDimension){
                $dim = new Category();
                $dim->name = $forthDimension;
                $dim->dimension_level = 4;
                $dim->parent = $thirdDimension->id;
                $dim->save();
            }
        }
    }

    public function createFifthDimensions(){
        $forthDimensions = Category::where('dimension_level',4)->get();
        foreach ($forthDimensions as $forthDimension){
            $fifthDimensions = $this->getSubDimensionName($forthDimension->name, self::Dimensions_5);
            foreach ($fifthDimensions as $fifthDimension){
                $dim = new Category();
                $dim->name = $fifthDimension;
                $dim->dimension_level = 5;
                $dim->parent = $forthDimension->id;
                $dim->save();
            }
        }
    }

    public function getSubDimensionName($parent, $dimensions){
        $res = [];
        foreach ($dimensions as $dimension){
            if($dimension['parent'] === $parent) $res[] = $dimension['name'];
        }
        return $res;
    }
}
