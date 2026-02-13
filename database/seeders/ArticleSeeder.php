<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'id' => 1,
                'title' => "Cómo reducir tu factura de luz hasta un 60% con energía solar",
                'excerpt' => "Descubre las claves para maximizar el ahorro en tu factura eléctrica mediante la instalación de paneles solares y sistemas de autoconsumo.",
                'category' => "Estilos de vida",
                'date' => "2026-01-15",
                'image' => "https://images.unsplash.com/photo-1509391366360-2e959784a276?w=800&h=600&fit=crop",
                'content' => "Contenido completo del artículo...",
                'hidden' => false,
            ],
            [
                'id' => 2,
                'title' => "Subvenciones Next Generation para rehabilitación energética 2026",
                'excerpt' => "Guía completa sobre las ayudas disponibles para mejorar la eficiencia energética de tu vivienda con fondos europeos.",
                'category' => "Subvenciones",
                'date' => "2026-01-10",
                'image' => "https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=600&fit=crop",
                'content' => "Contenido completo del artículo...",
                'hidden' => false,
            ],
            [
                'id' => 3,
                'title' => "ODS 11: Ciudades sostenibles y el futuro de la vivienda",
                'excerpt' => "Exploramos cómo las viviendas sostenibles contribuyen a los Objetivos de Desarrollo Sostenible de la ONU.",
                'category' => "Agenda 2030",
                'date' => "2026-01-05",
                'image' => "https://images.unsplash.com/photo-1518005020951-eccb494ad742?w=800&h=600&fit=crop",
                'content' => "Contenido completo del artículo...",
                'hidden' => false,
            ],
            [
                'id' => 4,
                'title' => "Domótica verde: ahorra agua y energía inteligentemente",
                'excerpt' => "Las últimas tecnologías en domótica que te ayudan a reducir el consumo de recursos en tu hogar de forma automática.",
                'category' => "Estilos de vida",
                'date' => "2025-12-28",
                'image' => "https://images.unsplash.com/photo-1558002038-1055907df827?w=800&h=600&fit=crop",
                'content' => "Contenido completo del artículo...",
                'hidden' => false,
            ],
            [
                'id' => 5,
                'title' => "Ayudas para instalación de paneles solares en Valencia",
                'excerpt' => "Todo lo que necesitas saber sobre las subvenciones autonómicas y municipales para energía solar en la Comunidad Valenciana.",
                'category' => "Subvenciones",
                'date' => "2025-12-20",
                'image' => "https://images.unsplash.com/photo-1497440001374-f26997328c1b?w=800&h=600&fit=crop",
                'content' => "Contenido completo del artículo...",
                'hidden' => false,
            ],
            [
                'id' => 6,
                'title' => "Calefacción eficiente: aerotermia vs biomasa",
                'excerpt' => "Comparativa completa de sistemas de calefacción sostenibles para ayudarte a elegir la mejor opción para tu hogar.",
                'category' => "Estilos de vida",
                'date' => "2025-12-15",
                'image' => "https://images.unsplash.com/photo-1545259741-2ea3ebf61fa3?w=800&h=600&fit=crop",
                'content' => "Contenido completo del artículo...",
                'hidden' => false,
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
