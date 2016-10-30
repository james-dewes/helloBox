try:
    from capture import capture
except RuntimeError:
    print("unable to import capture")

import time
import gzip
import json
import os
import subprocess

camera = capture()
subprocess.call('arecord -d 10 -c 1 -D plughw:1,0 -v -r 48000 -t wav -f S16_LE -M audio.wav')
camera.start_capture()
time.sleep(10)
camera.stop_capture()
##print("capture complete. Zipping")
gzip.GzipFile('example.h264')
result = {"complete":True}
print json.dumps(result)
