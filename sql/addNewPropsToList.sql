INSERT INTO properties (alias, name)
SELECT :alias, :name
FROM dual
WHERE NOT EXISTS (
    SELECT 1
    FROM properties
    WHERE alias = :alias
)