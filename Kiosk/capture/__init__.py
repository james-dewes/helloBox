#import resources
try:
    import picamera
except RuntimeError:
    print("Error importing picamera")

try:
    import os.path
except RuntimeError:
    print("Error importing os.path")

class capture:
    def __init__(self):
        self.video_name = 'example'
        self.audio_name = ''
        self.audio_format = ''
        self.video_format = 'h264'
        self.camera = picamera.PiCamera()
        self.save_path = ''

    def start_capture(self):
        try:
            camera.start_recording(self.video_name + '.' + self.video_format)
        except:
            print("No capture fool!")

    def stop_capture(self):
        try:
            self.camera.stop_recording()
        except:
            print('You\'re still on camera sucka!')
