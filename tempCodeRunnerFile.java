class TV {
    int channel = 0;
    int volumeLevel = 0;
    boolean on = true;
  
    public TV(){
    }
  
    public void turnOff() {
       on = false;
    }
    public void setChannel(int newChannel) {
       this.channel = newChannel;
    }
    public void setVolume(int newVolumeLevel) {
       this.volumeLevel = newVolumeLevel;
    }
    public void channelUp() {
       channel++;
    }
    public void channelDown() {
       channel--;
    }
    public void volumeUp() {
       volumeLevel++;
    }
    public void volumeDown() {
       volumeLevel--;
    }
  
  }
  
  public class TestTV {
    public static void main(String[] args) {
      TV tv1 = new TV();
      tv1.turnOn();
      tv1.setChannel(30);
      tv1.setVolume(3);
      
      TV tv2 = new TV();
      tv2.turnOn();
      tv2.channelUp();
      tv2.channelUp();
      tv2.channelUp();
      tv2.volumeUp();
      tv2.volumeUp();
  
      System.out.println("tv1's channel is " + tv1.channel + " and volume level is " + tv1.volumeLevel);
      System.out.println("tv2's channel is " + tv2.channel + " and volume level is " + tv2.volumeLevel);
    }
}