-- LISTAR CATEGORIA POR ID
CREATE OR REPLACE FUNCTION public.func_categoria_r(code integer)
    RETURNS TABLE(result json)
    LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM (
		SELECT
		c."ID",
		c.categoria
		FROM tm_categoria c
		INNER JOIN tm_sucursal s ON c.sucursal = s."ID"
		WHERE
		c."ID"   = code
		AND
		c.estado = TRUE
	)r;
END;
$function$

-- LISTAR CATEGORIA POR SUCURSAL
CREATE OR REPLACE FUNCTION public.func_categoria_sucursal(suc integer)
    RETURNS TABLE(result json)
    LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM (
		SELECT
		c."ID",
		c.categoria
		FROM tm_categoria c
		INNER JOIN tm_sucursal s ON c.sucursal = s."ID"
		WHERE
		c.sucursal = suc
		AND
		c.estado   = TRUE
	)r;
END;
$function$


-- CREAR CATEGORIA
CREATE OR REPLACE FUNCTION public.func_categoria_c(suc integer, name character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	INSERT INTO tm_categoria (sucursal,categoria, creacion, estado)
	VALUES (suc, UPPER(name), NOW(), TRUE);
END;
$function$

-- ACTUALIZAR CATEGORIA
CREATE OR REPLACE FUNCTION public.func_categoria_u(id integer, suc integer, name character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_categoria c
	SET
	sucursal  = suc,
	categoria = UPPER(name)
	WHERE
	"ID" = id;
END;
$function$

-- ELIMINAR CATEGORIA
CREATE OR REPLACE FUNCTION public.func_categoria_d(id integer)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
UPDATE tm_categoria
	SET estado = FALSE
	WHERE
	"ID"       = id;
END;
$function$

