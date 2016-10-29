try:
    from capture import capture
except RuntimeError:
    print("unable to import capture")

import time

camera = capture()
camera.start_capture()
time.sleep(30)
camera.stop_capture()
print("capture complete")
