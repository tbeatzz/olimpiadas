#define boton 2
#include <LiquidCrystal.h> // incluimos la libreria de la pantalla lcd
LiquidCrystal lcd (8,9,   4,5,6,7); //reconocemos los pines de uso
int buzzerPin = 10;  //pin del arduino

int estado = 0; 
int cambioEstado = 0; // 0- todo controlado - 1- ALERTAAAAA.
int contadorPulsador = 0;
bool banderaPulsador = true;


void setup() {
  lcd.begin(16,2); // Reconocemos y empezamos el LCD
  pinMode(buzzerPin, OUTPUT); //inicializamos el pin del altavoz para que sea salida.
  analogWrite(buzzerPin, 0); //lo mismo con el pin del altavoz
  pinMode(boton, INPUT); // boton como entrada.
  Serial.begin(9600);
}



void loop() {

  int estado = digitalRead(boton);

  switch (cambioEstado) {
    case 0:
lcd.clear();
      do {
        if (estado == LOW && contadorPulsador != 0) {  //reiniciar el pulsador cuando se suelta
          contadorPulsador = 0;
        }
        if (estado == HIGH && contadorPulsador < 5) {  // sumar contador
          contadorPulsador++;
          Serial.println(contadorPulsador);
          delay(150);

        } else {
          banderaPulsador = false;
          contadorPulsador = 0;
        }
      } while (banderaPulsador == true);
      if (contadorPulsador == 3 && banderaPulsador == false) {
        cambioEstado = 1;
      }
      break;
    case 1: 
    tone(buzzerPin, 261, 200); //envivamos un tono al pin de altavoz
    delay(400);
    lcd.setCursor (0,0); // (Columna fila) 
    lcd.print("  ALERTA AZUL"); // imprimimos en la pantalla la palabra electroall en la primera fila
    lcd.setCursor (0,1);     // (columna fila) 
    lcd.print ("   Quirofano"); // imprimimos en la pantalla la palabra electroallm en la seguna fila

      do {
        if (estado == LOW && contadorPulsador != 0) {  //reiniciar el pulsador cuando se suelta
          contadorPulsador = 0;
        }
        if (estado == HIGH && contadorPulsador < 3) {  // sumar contador
          contadorPulsador++;
          Serial.println(contadorPulsador);
          delay(150);

        } else {
          banderaPulsador = false;
          contadorPulsador = 0;
        }
      } while (banderaPulsador == true);
      if (contadorPulsador == 3 && banderaPulsador == false) {
        cambioEstado = 0;
      }
      break;    

  }


}









//tone(buzzerPin, 261, 200); //envivamos un tono al pin de altavoz
//delay(400);
//lcd.setCursor (0,0); // (Columna fila) 
//lcd.print("  ALERTA AZUL"); // imprimimos en la pantalla la palabra electroall en la primera fila
//lcd.setCursor (0,1);     // (columna fila) 
//lcd.print ("   Quirofano"); // imprimimos en la pantalla la palabra electroallm en la seguna fila
