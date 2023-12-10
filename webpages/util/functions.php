<?php
  function returnFirstLetter ($string) {
    $string = str_split($string);
    
    switch ($string [0]) {
      case "a":
      case "A":
        return "A";
        break;
      case "b":
      case "B":
        return "B";
        break;
      case "c":
      case "C":
        return "C";
        break;
      case "d":
      case "D":
        return "D";
        break;
      case "e":
      case "E":
        return "E";
        break;
      case "f":
      case "F":
        return "F";
        break;
      case "g":
      case "G":
        return "G";
        break;
      case "h":
      case "H":
        return "H";
        break;
      case "i":
      case "I":
        return "I";
        break;
      case "j":
      case "J":
        return "J";
        break;
      case "k":
      case "K":
        return "K";
        break;
      case "l":
      case "L":
        return "L";
        break;
      case "m":
      case "M":
        return "M";
        break;
      case "n":
      case "N":
        return "N";
        break;
      case "o":
      case "O":
        return "O";
        break;
      case "p":
      case "P":
        return "P";
        break;
      case "q":
      case "Q":
        return "Q";
        break;
      case "r":
      case "R":
        return "R";
        break;
      case "s":
      case "S":
        return "S";
        break;
      case "t":
      case "T":
        return "T";
        break;
      case "u":
      case "U":
        return "U";
        break;
      case "v":
      case "V":
        return "V";
        break;
      case "w":
      case "W":
        return "W";
        break;
      case "x":
      case "X":
        return "X";
        break;
      case "y":
      case "Y":
        return "Y";
        break;
      case "z":
      case "Z":
        return "Z";
        break;
      default:
        return "DEFAULT";
        break;
    }
  }

  function formatDateTime ($dateTime) {
    return $formated_date = date_format(date_create($dateTime), 'l, F d, Y \a\t g:i A');
  }

  function generateSelect ($value) {
    echo '<option value="'.$value.'">'.$value.'</option>';
  }

  function generateProvinces ($current) {
    $provinces = [
      "Abra",
      "Agusan del Norte",
      "Agusan del Sur",
      "Aklan",
      "Albay",
      "Antique",
      "Apayao",
      "Aurora",
      "Basilan",
      "Bataan",
      "Batanes",
      "Batangas",
      "Benguet",
      "Biliran",
      "Bohol",
      "Bukidnon",
      "Bulacan",
      "Cagayan",
      "Camarines Norte",
      "Camarines Sur",
      "Camiguin",
      "Capiz",
      "Catanduanes",
      "Cavite",
      "Cebu",
      "Cotabato",
      "Davao de Oro",
      "Davao del Norte",
      "Davao del Sur",
      "Davao Occidental",
      "Davao Oriental",
      "Dinagat Islands",
      "Eastern Samar",
      "Guimaras",
      "Ifugao",
      "Ilocos Norte",
      "Ilocos Sur",
      "Iloilo",
      "Isabela",
      "Kalinga",
      "La Union",
      "Laguna",
      "Lanao del Norte",
      "Lanao del Sur",
      "Leyte",
      "Maguindanao del Norte",
      "Maguindanao del Sur",
      "Marinduque",
      "Masbate",
      "Metro Manila",
      "Misamis Occidental",
      "Misamis Oriental",
      "Mountain Province",
      "Negros Occidental",
      "Negros Oriental",
      "Northern Samar",
      "Nueva Ecija",
      "Nueva Vizcaya",
      "Occidental Mindoro",
      "Oriental Mindoro",
      "Palawan",
      "Pampanga",
      "Pangasinan",
      "Quezon",
      "Quirino",
      "Rizal",
      "Romblon",
      "Samar",
      "Sarangani",
      "Siquijor",
      "Sorsogon",
      "South Cotabato",
      "Southern Leyte",
      "Sultan Kudarat",
      "Sulu",
      "Surigao del Norte",
      "Surigao del Sur",
      "Tarlac",
      "Tawi-Tawi",
      "Zambales",
      "Zamboanga del Norte",
      "Zamboanga del Sur",
      "Zamboanga Sibugay"];
    foreach ($provinces as $province) {
      echo '<option value="'.$province.'"';
      if ($current == $province) {
        echo "selected";
      };
      echo '>'.$province.'</option>';
    }
  }
?>