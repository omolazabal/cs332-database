
files=( "professor"
        "department"
        "student"
        "course"
        "section"
        "enrollment"
        "minor" 
        "prerequisites"
        "college_degrees" )

touch tables

for i in "${files[@]}"
do
    cat "sql/$i" >> tables
done

mysql -h mariadb -u $1 -p $2 < tables
rm tables

