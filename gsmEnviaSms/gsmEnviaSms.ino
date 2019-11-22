#include<SoftwareSerial.h>
#include<dht.h>

#define dht_pin A1 // Ligado no analógico 1
#define DHTTYPE DHT11

SoftwareSerial mySerial(10, 11); // SIM800L TX & RX estão conectados ao Arduino #11 & #10

dht my_dht; // Objeto para o sensor

int temp_c = 0, ura = 0;

void setup() {
  
  Serial.begin(9600);
  mySerial.begin(9600);
  
  my_dht.read11(dht_pin);

  temp_c = my_dht.temperature;
  ura = my_dht.humidity;

}

void loop() {
  
  Serial.println("\nInicializando..."); 
  delay(1000);

  mySerial.println("AT"); // Quando o handshake tiver sucesso, retornará OK.
  updateSerial();

  mySerial.println("AT+CMGF=1"); // Configurando modo de texto
  updateSerial();
  
  mySerial.println("AT+CMGS=\"+0000000000000\""); // Número para mandar o SMS
  updateSerial();
 
  mySerial.print("teste.teste/n.php?c");
  updateSerial();
  mySerial.print("=");
  updateSerial();
  mySerial.print(temp_c); // Mensagem SMS
  updateSerial();

  mySerial.print("&u");
  updateSerial();
  mySerial.print("=");
  updateSerial();
  mySerial.print(ura);
  updateSerial();

  mySerial.write(26);

  delay(60000); // Espera 1 minuto

}

void updateSerial() {

  delay(500);

  while (Serial.available()) {

    mySerial.write(Serial.read()); // Encaminhar o serial recebido para a porta serial de software

  }

  while (mySerial.available()) {

    Serial.write(mySerial.read()); // Encaminhar o software serial recebido para a porta serial
  }
}
