#!/bin/bash

for fmd in *.md
do
	echo $fmd
	file=${fmd%.md}	
	echo $file
	${HOME}/utils/evermd -o $file.html -t $file.t.html -n '\[% body %\]' $file.md
done

exit 0 
