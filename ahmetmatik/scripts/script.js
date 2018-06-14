if ((self.parent && !(self.parent === self)) && (self.parent.frames.length != 0)) {
    window.stop();
    document.execCommand('Stop');
    self.parent.location = document.location;
}