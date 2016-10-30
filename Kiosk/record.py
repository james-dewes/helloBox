try:
    from capture import capture
except RuntimeError:
    print("unable to import capture")

import time
import gzip
import json

camera = capture()
camera.start_capture()
time.sleep(10)
camera.stop_capture()
##print("capture complete. Zipping")
gzip.GzipFile('example.h264')
result = {"complete"}
print json.dumps(result)
