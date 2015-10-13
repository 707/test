set ns [new Simulator]
set n0 [$ns node]
set n1 [$ns node]
set n2 [$ns node]
set n3 [$ns node]
set n4 [$ns node]
set n5 [$ns node]
$n0 color "purple"
$n1 color "purple"
$n2 color "violet"
$n3 color "violet"
$n4 color "chocolate"
$n5 color "chocolate"
set f [open stopwait.tr w]
$ns trace-all $f
set nf [open stopwait.nam w]
$ns namtrace-all $nf
$ns at 0.0 "$n0 label SYS0"
$ns at 0.0 "$n1 label SYS1"
$ns at 0.0 "$n2 label SYS2"
$ns at 0.0 "$n3 label SYS3"
$ns at 0.0 "$n4 label SYS4"
$ns at 0.0 "$n5 label SYS5"
$ns duplex-link $n0 $n2 0.2Mb 20ms DropTail
$ns duplex-link $n1 $n2 0.2Mb 20ms DropTail
$ns duplex-link $n2 $n3 0.2Mb 20ms DropTail
$ns duplex-link $n3 $n4 0.2Mb 20ms DropTail
$ns duplex-link $n3 $n5 0.2Mb 20ms DropTail
$ns duplex-link-op $n0 $n2 orient right-down
$ns duplex-link-op $n1 $n2 orient right-up
$ns duplex-link-op $n2 $n3 orient right
$ns duplex-link-op $n3 $n4 orient right-up
$ns duplex-link-op $n3 $n5 orient right-down
$ns queue-limit $n0 $n2 10
Agent/TCP set_nam_tracevar_true
set tcp [new Agent/TCP]
$tcp set window 1
$tcp set maxcwnd 1
$tcp set fid 1
$ns attach-agent $n0 $tcp
set sink [new Agent/TCPSink]
$ns attach-agent $n5 $sink
$ns connect $tcp $sink
set ftp [new Application/FTP]
$ftp attach-agent $tcp
$ns add-agent-trace $tcp tcp
$ns monitor-agent-trace $tcp
$tcp tracevar cwnd
$ns at 0.1 "$ftp start"
$ns at 0.53 "$ns queue-limit $n3 $n5 0"
$ns at 0.80 "$ns queue-limit $n3 $n5 5"
$ns at 2.0 "$ns detach-agent $n0 $tcp ; $ns detach-agent $n5 $sink"
$ns at 2.5 "finish"
#$ns at 0.0 "$ns trace-annotate \"STOPWAIT\""
$ns at 0.01 "$ns trace-annotate \"FTP starts at 0.01\""
$ns at 0.10 "$ns trace-annotate \"Send Request SYS0 to SYS5\""
$ns at 0.18 "$ns trace-annotate \"Receive Request SYS5 to SYS0\""
$ns at 0.24 "$ns trace-annotate \"Send Packet_0 SYS0 to SYS5\""
$ns at 0.42 "$ns trace-annotate \"Receive Ack_0\""
$ns at 0.48 "$ns trace-annotate \"Send Packet_1\""
$ns at 0.60 "$ns trace-annotate \"Disconnect N2 So loss the packet1\""
$ns at 0.67 "$ns trace-annotate \"Waiting for Ack_1\""
$ns at 0.95 "$ns trace-annotate \"Send Packet_1 again\""
$ns at 1.95 "$ns trace-annotate \"Deattach SYS3,Packet_1 again\""
$ns at 2.09 "$ns trace-annotate \"Receive Ack_1\""
$ns at 2.10 "$ns trace-annotate \"SEnd Packet_2\""
$ns at 2.38 "$ns trace-annotate \"Receive Ack_2\""
$ns at 2.5 "$ns trace-annotate \"FTP stops\""
proc finish {} {
             global ns nf
             $ns flush-trace
             close $nf
             exec nam stopwait.nam &
             exit 0
}
$ns run
