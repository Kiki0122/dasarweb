<?php
$menu = [
    [
        "nama" => "Beranda"
    ],
    [
        "nama" => "Berita",
        "subMenu" => [
            [
                "nama" => "Wisata",
                "subMenu" => [
                    [
                        "nama" => "Pantai"
                    ],
                    [
                        "nama" => "Gunung"
                    ]
                ]
            ],
            [
                "nama" => "Kuliner"
            ],
            [
                "nama" => "Hiburan"
            ]
        ]
    ],
    [
        "nama" => "Tentang"
    ],
    [
        "nama" => "Kontak"
    ]
];

// Function to display the menu recursively
function displayMenu($menu) {
    echo '<ul>'; // Start an unordered list
    foreach ($menu as $item) {
        echo '<li>' . $item['nama']; // Display the menu item name
        if (isset($item['subMenu'])) { // Check if there is a submenu
            displayMenu($item['subMenu']); // Recursive call for submenus
        }
        echo '</li>'; // Close the list item
    }
    echo '</ul>'; // Close the unordered list
}

// Display the menu
displayMenu($menu);
?>
