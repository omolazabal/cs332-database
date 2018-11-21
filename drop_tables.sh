
files=( "college_degrees"
        "prerequisites"
        "minor" 
        "enrollment"
        "section"
        "course"
        "student"
        "department"
        "professor" )

touch drop

for i in "${files[@]}"
do
    echo "DROP TABLE $i;" >> drop
done

mysql -h mariadb -u $1 -p $2 < tables
rm drop

