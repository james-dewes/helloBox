##try:
##    import RPi.GPIO as GPIO
##except RuntimeError:
##    print("Error importing Rpi.GPIO")
import sys, json

# Load the data that PHP sent us
try:
    data = json.loads(sys.argv[1])
except:
    print "ERROR"
    sys.exit(1)

# Generate some data to send to PHP
result = {'status': 'True'}

# Send it to stdout (to PHP)
print json.dumps(result)
