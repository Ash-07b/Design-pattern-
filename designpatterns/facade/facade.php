<?
class Amplifier {
    turnOn() { console.log('Amplifier on');}
    setVolume(level) { console.log(`volume: ${level}`);}
}

class Lights {
    dim(level) { console.log(`Lights dimmed to ${level}`);}
}
class Facade {
    constructor(amp, lights){
        this.amp = amp;
        this.lights = lights;
    }
    watchMovie() {
        this.amp.on();
        this.amp.setVolume(5);
        this.lights.dim(2);
    }
}

const amp = new Amplifier();
const lights = new Lights();
amp.turnOn();
const homeTheater = new Facade(amp, lights);
homeTheater.watchMovie();