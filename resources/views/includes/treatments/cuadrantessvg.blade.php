<?php if ($treatment['treatment'] === 'cuadrante') {
        switch ($treatment['pattern']) {
            case 'cuadrante1':
            echo '<svg class="svg-cuadrante cuadrante1" height="15" width="37">
                    <polyline points="0,10 30,10 30,0" style="fill:#c94c4c;stroke:white;stroke-width:2" />
                    Tu navegador no soporta svg.
                  </svg>';
            break;
            case 'cuadrante2':
                echo '<svg class="svg-cuadrante cuadrante2" height="15" width="37">
                        <polyline points="1,0 1,10 30,10" style="fill:#c94c4c;stroke:white;stroke-width:2" />
                        Tu navegador no soporta svg.
                     </svg>';
                break;
            case 'cuadrante3':
                echo '<svg class="svg-cuadrante cuadrante3" height="15" width="37">
                        <polyline points="0,1 30,1 30,10" style="fill:#c94c4c;stroke:white;stroke-width:2" />
                        Tu navegador no soporta svg.
                      </svg>';
                break;
            case 'cuadrante4':
                echo '<svg class="svg-cuadrante cuadrante4" height="15" width="37">
                        <polyline points="1,10 1,1 30,1" style="fill:#c94c4c;stroke:white;stroke-width:2" />
                        Tu navegador no soporta svg.
                      </svg>';
                break;
        }
    }
?>