#import resources
import picamera3
class capture:
    def __init__(self):
        self.video_name = ''
        self.audio_name = ''
        self.audio_format = ''
        self.video_format = 'h'
        self.camera = picamera.PiCamera()

    def start_capture(self):
        try:
            camera.start_recording(self.video_name)
        except:
            print("No capture fool!")

    def stop_capture(self):
        try:
            self.camera.stop_recording()
        except:
            print('You\'re still on camera sucka!')
