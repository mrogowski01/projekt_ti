
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style2.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

    <title>Strona główna</title>
</head>
    <body>
        <div>
            <form method="post" action="logout.php">
                <div>
                <?php
                include('Register_new.php');
                include('Save.php');
                    session_start();
                    if($_SESSION['auth_my1'] == 'OK'){
                        echo '<input class="button" type="submit" name="logout" value="Wyloguj się">';
                        $file = "./data_users.db" ;
                        $logged_email =  $_SESSION['user'];
                        $db = dba_open( $file, "r");  
                        $serialized_data = dba_fetch($logged_email, $db);
                        
                        $data_to_load = unserialize($serialized_data);
                        $arr = dba_key_split($serialized_data);
                        dba_close($db) ;
                    }
                    if(isset($_POST["amplitude_input_1"])){
                        $save = new Save;
                        $save->read();
                        $save->save();
                        header('Location: strona_glowna.php');
                        }
                ?>
                </div>
            </form>
        </div>

        <div>
            <form method="post" action="index.php">
                <div>
                <?php
                    if($_SESSION['auth_my1'] != 'OK'){
                        echo '<input class="button" type="submit" name="logout" value="Powrót do strony głównej">';
                            }
                ?>
                </div>
            </form>
        </div>

        <div class="mainpage">
        
            <article>
            <h1 class="title">
                Fale - interferencja, dudnienie
            </h1>
            
            <p>
                Fala to zaburzenie rozprzestrzeniające się w ośrodku lub przestrzeni. Najprostszym rodzajem fali jest fala harmoniczna, zwana też falą sinusoidalną, rozchodząca się w ośrodku jednowymiarowym. 
            </p>
            <p>
                Fala sinusoidalna jest wyznaczona przez dwa parametry: amplitudę i częstotliwość. Amplituda określa maksymalne odchylenie od położenia równowagi, a częstotliwość opisuje liczbę pełnych drgań, które występują w ciągu jednostki czasu. 
            </p>
            <p>
                Równanie fali ma następującą postać:
                $$ y = Asin(2 \pi ft) = Asin ( \omega t), $$ 
                gdzie A - amplituda fali, f - częstotliwość, \( \omega \) - częstość kołowa fali
                        </p>
            <p>
                Częstość kołowa fali opisuje szybkość, z jaką powtarza się jedno pełne drganie elementu ośrodka. 
            </p>
            <h1>
                Interferencja, dudnienie
            </h1>
            <p>
            Interferncję fali można opisać jako jawisko powstawania nowego, przestrzennego rozkładu amplitudy fali, wzmocnienia lub wygaszenia w wyniku nakładania się (superpozycji) dwóch lub więcej fal. Wzmocnienie następuje kiedy fale są w zgodnej fazie, natomiast gdy fale są w przeciwnej fazie wygaszenie. 
            </p>
            <p>
                Dudnienie to przykład interferencji w czasie. Występuje w wyniku superpozycji dwóch fal biegnących w tym samym kierunku o jednakowych amplitudach, ale nieznacznie różnych częstościach kołowych, analogicznie częstotliwościach. W tym celu rozpatrzymy w danym punkcie x przestrzeni wypadkową tych fal. Drgania harmoniczne danej cząstki ośrodka wywołane przez te fale mają postać: 
                $$ y_1 = Asin ( \omega_1 t) $$ 
                $$ y_2 = Asin ( \omega_2 t) $$
            </p>
            <p>
                a drganie wypadkowe:
                $$ y = y_1 + y_2 $$
                $$ y = A(sin(\omega_1 t) + sin(\omega_2 t)) $$ 
            </p>
            <p>
                Ze wzoru na sumę sinusów otrzymujemy:
                $$ y = 2Acos \left(\frac{\omega_1 - \omega_2}2{t} \right)sin \left(\frac{\omega_1 + \omega_2}2{t} \right) $$
            </p>
            <p>
                lub po wprowadzeniu nowych oznaczeń: 
                $$ \omega_m = \left(\frac{\omega_1 - \omega_2}2{t} \right)  $$
                $$ \omega_w = \left(\frac{\omega_1 + \omega_2}2{t} \right) $$
            </p>
            <p>
                Powstające w wyniku złożenia drganie można traktować jako drganie, którego częstość jest równa średniej arytmetycznej częstości drgań składowych, zaś amplituda zmienia się znacznie wolniej, co można ująć matematycznie: 
                $$ y = B(t)sin(\omega_w t), $$
                gdzie: 
                $$ B(t) = 2Acos(\omega_m t) $$
            </p>
            <p> 
            Funkcja \( B(t) \) przyjmuje na przemian wartości dodatnie i ujemne. Jej wartość bezwzględna \( |B(t)| \) nosi nazwę obwiedni. Jest to funkcja zmieniająca się z częstością \( 2 \omega_m \) , a zatem równą różnicy częstości składanych drgań (nie zaś połowie tej różnicy).
            </p>

            <p>
                W celu zaobserowania dudnienia należy wybrać odpowiednie parametry dwóch fal. Amplitudy muszą być sobie równe a częstości nieznacznie się różnić, muszą być do siebie zbliżone. Wyświetlić obie fale zaznaczając odpowiednie pola, następnie zaznaczyć pole z wykresem dudnienia i obwiedni.
            </p>
            


            </article>

        

        <div id="anim">
        <div>
        <?php
        if($_SESSION['auth_my1'] == 'OK'){
        
            ?>
            <form method="post">
            <div class="wykresy">
                <div class="wykres">
                    <div>
                        <label class="fala">Fala 1</label>
                    </div>
                    <div>
                        <label for="amplitude_input_1">Amplituda:</label>
                        <input type="number" name="amplitude_input_1" id="amplitude_input_1" min="-10" max="10" value="<?= $data_to_load['amp1']; ?>">
                    </div>
                    <div>
                        <label for="frequency_input_1">Częstość kołowa:</label>
                        <input type="number" step="0.1" name="frequency_input_1" id="frequency_input_1" min="0" max="10" value="<?= $data_to_load['freq1']; ?>">
                    </div>
                    <div>
                        <label for="pokaz_sinus_1">Wykres fali 1:</label>
                        <input type="checkbox" id="pokaz_sinus_1">
                    </div>
                </div>
                
                <div class="wykres">
                    <div>
                        <label class="fala">Fala 2</label>
                    </div>
                    <div>
                        <label for="amplitude_input_2">Amplituda:</label>
                        <input type="number" name="amplitude_input_2" id="amplitude_input_2" min="-10" max="10" value="<?= $data_to_load['amp2']; ?>">
                    </div>
                    <div>
                        <label for="frequency_input_2">Częstość kołowa:</label>
                        <input type="number" step="0.1" name="frequency_input_2" id="frequency_input_2" min="0" max="10" value="<?= $data_to_load['freq2']; ?>">
                    </div>
                    <div>
                        <label for="pokaz_sinus_2">Wykres fali 2:</label>
                        <input type="checkbox" id="pokaz_sinus_2">
                    </div>
                </div>
            </div>

        <?php
        }
        else{

        ?>
            <div class="wykresy">
                <div class="wykres">
                    <div>
                        <label class="fala">Fala 1</label>
                    </div>
                    <div>
                        <label for="amplitude_input_1">Amplituda:</label>
                        <input type="number" name="amplitude_input_1" id="amplitude_input_1" min="-10" max="10" value="1">
                    </div>
                    <div>
                        <label for="frequency_input_1">Częstość kołowa:</label>
                        <input type="number" step="0.1" name="frequency_input_1" id="frequency_input_1" min="0" max="10" value="0">
                    </div>
                    <div>
                        <label for="pokaz_sinus_1">Wykres fali 1:</label>
                        <input type="checkbox" id="pokaz_sinus_1">
                    </div>
                </div>
                
                <div class="wykres">
                    <div>
                        <label class="fala">Fala 2</label>
                    </div>
                    <div>
                        <label for="amplitude_input_2">Amplituda:</label>
                        <input type="number" name="amplitude_input_2" id="amplitude_input_2" min="-10" max="10" value="1">
                    </div>
                    <div>
                        <label for="frequency_input_2">Częstość kołowa:</label>
                        <input type="number" step="0.1" name="frequency_input_2" id="frequency_input_2" min="0" max="10" value="0">
                    </div>
                    <div>
                        <label for="pokaz_sinus_2">Wykres fali 2:</label>
                        <input type="checkbox" id="pokaz_sinus_2">
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="wykresy">
        <div class="savebutton">
            <?php
                if($_SESSION['auth_my1'] == 'OK'){   
                    echo '<input class="button" type="submit" name="save" value="Zapisz dane">'; 
                }
                
            ?>
        </div>
        </div>
        </form>
        </div>
        </div>
    
    <div class="wykresy">
        <div class="wykres">
            <label for="pokaz_wykres">Wykres dudnienia:</label>
            <input type="checkbox" id="pokaz_wykres">
        </div>
        <div class="wykres">
            <label for="pokaz_wykres2">Wykres obwiedni:</label>
            <input type="checkbox" id="pokaz_wykres2">
        </div>
    </div>


    <div class="mainplot" style="width: 1200px; height: 200px;">
        <canvas id="plot" width="1200" height="200"></canvas>
        <p class="opis">
        Wykres 1: Wykres symulujący dudnienie powstające w wyniku superpozycji dwóch fal
        </p>
    </div>
    <script src="script.js"></script>
    </div>

      </body>

</html>