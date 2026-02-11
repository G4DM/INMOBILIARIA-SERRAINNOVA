<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            [
                'id' => 1,
                'title' => 'Villa Solar Pasiva Moderna',
                'price' => '895.000',
                'location' => 'Calle Verde 124, Valencia',
                'bedrooms' => 3,
                'bathrooms' => 2,
                'area' => 210,
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDfsKYiZ8Ll8AC4tE3eQi6kI_6xshOTzvTZ-xtApBbJK1Dy-pI4SqpZdnGQDoQE4Q_mlwKMwyVlfE_VJSfv2tujkT8n3Rrak87SbpACiNnFdVpzFEspCjEsJ5dZmP1_wg-XQpUaFowZ1d2K5o_0H8WtAkm8A7AoNuqAKcLB0ko4klE7d4-994U-40i9Qdww3owgb-UaV8kJvr-BQCQiiE74m3Pyog6RDKnTNViQn7VpdSGUZPZplksnUsXCvzgsjr5JYJDuiTug8ZsJ',
                'energy_certification' => 'A',
                'energy_type' => ['Solar', 'Aerotermia'],
                'materials' => ['Madera', 'Hormigón ecológico'],
                'co2_emissions' => 12,
                'co2_savings' => 65,
                'description' => 'Esta impresionante villa moderna combina diseño contemporáneo con sostenibilidad de vanguardia. Equipada con paneles solares de última generación, sistemas de calefacción geotérmica y materiales de construcción ecológicos certificados. La propiedad cuenta con certificación energética A, garantizando mínimo impacto ambiental y máximo ahorro en costos energéticos.',
                'features' => ['Paneles Solares', 'Recolección de Agua', 'Calefacción Geotérmica', 'Materiales Ecológicos'],
                'sustainability_checklist' => [
                    'thermalInsulation' => [
                        'climalitWindows' => true,
                        'sateSystem' => true
                    ],
                    'energySources' => [
                        'aerothermal' => true,
                        'solarPanels' => true
                    ],
                    'waterConsumption' => [
                        'rainwaterRecovery' => true
                    ],
                    'materials' => [
                        'certifiedWood' => true,
                        'ecologicalPaints' => true
                    ]
                ],
                'certifications' => ['Passivhaus', 'LEED Gold']
            ],
            [
                'id' => 2,
                'title' => 'Refugio Sostenible',
                'price' => '620.000',
                'location' => 'Calle Pinos 42, Valencia',
                'bedrooms' => 2,
                'bathrooms' => 1,
                'area' => 145,
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBuxZoOI4hBp3fcCLy5WbmbyZ4FF7GJZqhsLX8HIrC7nrvbKe1Jm8jqg9S3JqhmKEcjzodD8O_2Ycst6D5o-P4qUKEFUr7jGBM0t5cvPekCytin-dwhvl1kd68xsizE4iIYdGV2ANAITrHq9v0Z9sulDEHg8an48NhhMoTno9mbPOY_e3ctndYNDVK-wrILEe_PXeS-pe2dhgASQwvaOD2pIMFjTeFxhWw2RtfosKdFRsHf4w3gcqwZ8ZYf4b8vVPAjyUuasw_t3sR5',
                'energy_certification' => 'B',
                'energy_type' => ['Biomasa'],
                'materials' => ['Madera', 'Ladrillo reciclado'],
                'co2_emissions' => 18,
                'co2_savings' => 52,
                'description' => 'Refugio acogedor diseñado con principios de arquitectura sostenible. Sistema de calefacción por biomasa de alta eficiencia, construcción con madera certificada FSC y ladrillos reciclados. Perfecto para quienes buscan un hogar cálido y respetuoso con el medio ambiente.',
                'features' => ['Sistema Biomasa', 'Madera Certificada', 'Aislamiento Natural', 'Ventilación Cruzada'],
                'sustainability_checklist' => [
                    'thermalInsulation' => [
                        'climalitWindows' => true,
                        'sateSystem' => false
                    ],
                    'energySources' => [
                        'aerothermal' => false,
                        'solarPanels' => false
                    ],
                    'waterConsumption' => [
                        'rainwaterRecovery' => false
                    ],
                    'materials' => [
                        'certifiedWood' => true,
                        'ecologicalPaints' => true
                    ]
                ],
                'certifications' => ['BREEAM']
            ],
            [
                'id' => 3,
                'title' => 'Complejo de Lofts Eco-Urbanos',
                'price' => '540.000',
                'location' => 'Calle Mercado 880, Valencia',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'area' => 92,
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDMecp_zqY8RZd3GPkk1mKu_kw-ZiixxP3b1J8jz2uYeMENMNLePSBT8OUPcy5iFF8LVuwQP5oXlN1SwiHt3YxzZn-tAX8vIypNlEuwiu_bOQvEyS59WY3nAIeX5LbHKHCIGtFqPuzRhVIkbFcQtw_L01IQa7b33fqKnrbAG6cExIl0E_-XJxoGtWJKtb-Hszf1MmrgYAHzMlaozFX1pJmuhrH1hfbFi_0j8sC-KtJQBQ0Ufp4xVr1mTU6d5DQGb5dorCKDnUzoj-cx',
                'energy_certification' => 'A',
                'energy_type' => ['Solar'],
                'materials' => ['Hormigón ecológico'],
                'co2_emissions' => 8,
                'co2_savings' => 78,
                'description' => 'Loft moderno en el corazón de Valencia con máxima eficiencia energética. Diseño minimalista con grandes ventanales que maximizan la luz natural. Sistema solar fotovoltaico integrado en la azotea comunitaria. Ideal para profesionales que valoran la sostenibilidad urbana.',
                'features' => ['Energía Solar Comunitaria', 'Domótica Integrada', 'Iluminación LED', 'Electrodomésticos A+++'],
                'sustainability_checklist' => [
                    'thermalInsulation' => [
                        'climalitWindows' => true,
                        'sateSystem' => true
                    ],
                    'energySources' => [
                        'aerothermal' => false,
                        'solarPanels' => true
                    ],
                    'waterConsumption' => [
                        'rainwaterRecovery' => false
                    ],
                    'materials' => [
                        'certifiedWood' => false,
                        'ecologicalPaints' => true
                    ]
                ],
                'certifications' => ['LEED Silver']
            ],
            [
                'id' => 4,
                'title' => 'Casa Bioclimática',
                'price' => '725.000',
                'location' => 'Avenida Sostenible 15, Valencia',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'area' => 280,
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDfsKYiZ8Ll8AC4tE3eQi6kI_6xshOTzvTZ-xtApBbJK1Dy-pI4SqpZdnGQDoQE4Q_mlwKMwyVlfE_VJSfv2tujkT8n3Rrak87SbpACiNnFdVpzFEspCjEsJ5dZmP1_wg-XQpUaFowZ1d2K5o_0H8WtAkm8A7AoNuqAKcLB0ko4klE7d4-994U-40i9Qdww3owgb-UaV8kJvr-BQCQiiE74m3Pyog6RDKnTNViQn7VpdSGUZPZplksnUsXCvzgsjr5JYJDuiTug8ZsJ',
                'energy_certification' => 'A',
                'energy_type' => ['Aerotermia', 'Solar'],
                'materials' => ['Madera'],
                'co2_emissions' => 10,
                'co2_savings' => 70,
                'description' => 'Vivienda unifamiliar diseñada siguiendo principios bioclimáticos. Orientación óptima para aprovechar el sol en invierno y sombra en verano. Sistema de aerotermia combinado con paneles solares. Construcción íntegramente en madera laminada de origen sostenible.',
                'features' => ['Diseño Bioclimático', 'Aerotermia', 'Paneles Solares', 'Construcción en Madera'],
                'sustainability_checklist' => [
                    'thermalInsulation' => [
                        'climalitWindows' => true,
                        'sateSystem' => true
                    ],
                    'energySources' => [
                        'aerothermal' => true,
                        'solarPanels' => true
                    ],
                    'waterConsumption' => [
                        'rainwaterRecovery' => true
                    ],
                    'materials' => [
                        'certifiedWood' => true,
                        'ecologicalPaints' => true
                    ]
                ],
                'certifications' => ['Passivhaus', 'BREEAM Excellent']
            ],
            [
                'id' => 5,
                'title' => 'Apartamento Eficiente',
                'price' => '385.000',
                'location' => 'Calle Ecología 67, Valencia',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'area' => 110,
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBuxZoOI4hBp3fcCLy5WbmbyZ4FF7GJZqhsLX8HIrC7nrvbKe1Jm8jqg9S3JqhmKEcjzodD8O_2Ycst6D5o-P4qUKEFUr7jGBM0t5cvPekCytin-dwhvl1kd68xsizE4iIYdGV2ANAITrHq9v0Z9sulDEHg8an48NhhMoTno9mbPOY_e3ctndYNDVK-wrILEe_PXeS-pe2dhgASQwvaOD2pIMFjTeFxhWw2RtfosKdFRsHf4w3gcqwZ8ZYf4b8vVPAjyUuasw_t3sR5',
                'energy_certification' => 'C',
                'energy_type' => ['Solar'],
                'materials' => ['Hormigón ecológico', 'Ladrillo reciclado'],
                'co2_emissions' => 25,
                'co2_savings' => 35,
                'description' => 'Apartamento moderno con buena eficiencia energética en zona residencial tranquila. Instalación solar para agua caliente sanitaria. Construcción con materiales reciclados y bajo impacto ambiental. Excelente relación calidad-precio para familias jóvenes.',
                'features' => ['Solar Térmica', 'Aislamiento Mejorado', 'Ventanas Doble Acristalamiento', 'Zona Verde Comunitaria'],
                'sustainability_checklist' => [
                    'thermalInsulation' => [
                        'climalitWindows' => true,
                        'sateSystem' => false
                    ],
                    'energySources' => [
                        'aerothermal' => false,
                        'solarPanels' => true
                    ],
                    'waterConsumption' => [
                        'rainwaterRecovery' => false
                    ],
                    'materials' => [
                        'certifiedWood' => false,
                        'ecologicalPaints' => true
                    ]
                ],
                'certifications' => []
            ],
            [
                'id' => 6,
                'title' => 'Chalet Renovado Ecológico',
                'price' => '950.000',
                'location' => 'Urbanización Verde 8, Valencia',
                'bedrooms' => 5,
                'bathrooms' => 4,
                'area' => 350,
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDMecp_zqY8RZd3GPkk1mKu_kw-ZiixxP3b1J8jz2uYeMENMNLePSBT8OUPcy5iFF8LVuwQP5oXlN1SwiHt3YxzZn-tAX8vIypNlEuwiu_bOQvEyS59WY3nAIeX5LbHKHCIGtFqPuzRhVIkbFcQtw_L01IQa7b33fqKnrbAG6cExIl0E_-XJxoGtWJKtb-Hszf1MmrgYAHzMlaozFX1pJmuhrH1hfbFi_0j8sC-KtJQBQ0Ufp4xVr1mTU6d5DQGb5dorCKDnUzoj-cx',
                'energy_certification' => 'B',
                'energy_type' => ['Biomasa', 'Solar'],
                'materials' => ['Madera', 'Ladrillo reciclado'],
                'co2_emissions' => 16,
                'co2_savings' => 58,
                'description' => 'Chalet completamente rehabilitado con criterios de máxima eficiencia energética. Proyecto de renovación integral que ha transformado una vivienda antigua en un hogar sostenible. Caldera de biomasa, instalación solar fotovoltaica de 8kW y aislamiento térmico de última generación.',
                'features' => ['Caldera Biomasa', 'Solar Fotovoltaica 8kW', 'Aislamiento Premium', 'Jardín Xerófito'],
                'sustainability_checklist' => [
                    'thermalInsulation' => [
                        'climalitWindows' => true,
                        'sateSystem' => true
                    ],
                    'energySources' => [
                        'aerothermal' => false,
                        'solarPanels' => true
                    ],
                    'waterConsumption' => [
                        'rainwaterRecovery' => true
                    ],
                    'materials' => [
                        'certifiedWood' => true,
                        'ecologicalPaints' => true
                    ]
                ],
                'certifications' => ['BREEAM Good']
            ]
        ];

        foreach ($properties as $property) {
            Property::create($property);
        }
    }
}
