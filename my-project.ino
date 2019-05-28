
#include <Adafruit_Fingerprint.h>
#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266mDNS.h>
#include <ESP8266HTTPClient.h>
#include <SoftwareSerial.h>

HTTPClient http;
SoftwareSerial fpsensor(12, 13);
ESP8266WebServer server(80);
Adafruit_Fingerprint finger = Adafruit_Fingerprint(&fpsensor);

void(* ku_reset) (void) = 0;
String urlf1 = "http://192.168.43.46/2019/kpu/Send/f1.php?finger_id=";
String urlf2 = "http://192.168.43.46/2019/kpu/Send/f2.php?finger_id=";
String payload;

int fingerprintID = 0;
int query = 0;
const char* ssid = "UINSGDNet";
const char* password = "uinbandunghotspot";
const char Start[] PROGMEM={""};
String test = "<a href='/'>Selesai</a>";
void handleRoot() {
  query = 0;
  server.send_P(200,"text/html",Start);
}

void handleSent() {
  server.send_P(200,"text/html",index_html);
}

void setup() {
  ESP.wdtDisable();
  ESP.wdtEnable(WDTO_8S);
  finger.begin(57600);
  Serial.begin(115200);
  WiFi.begin(ssid, password);
  Serial.println("");

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

  server.on("/", handleRoot);
  
  server.on("/QpksQWMLAAmsaiT", [](){
    if(query = 0){
      server.send(200,"text/html", test);
    }else{
      http.begin(urlf1 + String(finger.fingerID));
      int httpCode = http.GET();
      String payload = http.getString();
      Serial.println(payload);
      server.send(200,"text/html", test);
      http.end();
      query = 0;
    }
  });

  server.on("/aKapSxAzaqWe", [](){
    if(query = 0){
      server.send(200,"text/html", test);
    }else{
      http.begin(urlf2 + String(finger.fingerID));
      int httpCode = http.GET();
      String payload = http.getString();
      Serial.println(payload);
      server.send(200,"text/html", test);
      http.end();
      query = 0;
    }
  });
  
  if (finger.verifyPassword()) {
    Serial.println("Found fingerprint sensor!");
  }
  else {
    Serial.println("Did not find fingerprint sensor :(");
    while (1) {
      delay(1);
    }
  }

  if (MDNS.begin("esp8266")) {
    Serial.println("MDNS responder started");
  }
 
  server.begin();
  Serial.println("HTTP server started");
}

void loop() {
  server.handleClient();
  fingerprintID = getFingerprintIDez();
  delay(50);
  server.on("/next", [](){
    if (WiFi.status() == WL_CONNECTED && query == 1) {
      server.send(200,"text/html",index_html);
      delay(500);
    }
  });
}


int getFingerprintIDez() {
  uint8_t p = finger.getImage();
  if (p != FINGERPRINT_OK) return -1;

  p = finger.image2Tz();
  if (p != FINGERPRINT_OK) return -1;


  p = finger.fingerFastSearch();
  if (p != FINGERPRINT_OK) {
    Serial.println("not found");
    ESP.wdtFeed();
    query = 0;
    server.send_P(200,"text/html",Not);
    return -1;
  }
  Serial.print("Found ID #");
  Serial.print(finger.fingerID);
  Serial.print(" with confidence of ");
  Serial.println(finger.confidence);
  query = 1;
  return finger.fingerID;
}
