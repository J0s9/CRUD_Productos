-- LISTAR COMPANIA
CREATE OR REPLACE FUNCTION public.func_compania()
	RETURNS TABLE(result json)
	LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM(
	SELECT
	c."ID",
	c.compania
	FROM tm_compania c
	WHERE
	c.estado = TRUE
	)r;
END;
$function$

-- LISTAR COMPANIA POR ID
CREATE OR REPLACE FUNCTION func_compania_r(code INTEGER)
RETURNS TABLE (RESULT JSON)
AS $$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM (
		SELECT
		c."ID",
		c.compania
		FROM tm_compania c
		WHERE
		c."ID" 	 = code
		AND
		c.estado = TRUE
	)r;
END;
$$LANGUAGE PLPGSQL;

-- CREAR COMPANIA
CREATE OR REPLACE FUNCTION public.func_compania_c(cmp character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	INSERT INTO tm_compania (compania, creacion, estado)
	VALUES (UPPER(cmp), now(), TRUE);
END;
$function$

-- ACTUALIZAR COMPANIA
CREATE OR REPLACE FUNCTION public.func_compania_u(id integer, name character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_compania
	SET compania = upper(name) 
	WHERE
	"ID" = id;
END;
$function$

-- ELIMINAR COMPANIA

CREATE OR REPLACE FUNCTION public.func_compania_d(id integer)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
UPDATE tm_compania
	SET estado = FALSE
	WHERE
	"ID"       = id;
END;
$function$

