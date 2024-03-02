-- LISTAR EMPRESA POR ID
CREATE OR REPLACE FUNCTION public.func_empresa_r(code integer)
    RETURNS TABLE(result json)
    LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM(
        SELECT
        e."ID",
        e.empresa,
        e.ruc
        FROM tm_empresa e
        WHERE
        e."ID"   = code
        AND
        e.estado = TRUE
	)r;
END;
$function$

-- LISTAR EMPRESA POR COMPANIA
CREATE OR REPLACE FUNCTION public.func_empresa_compania(comp integer)
    RETURNS TABLE(result json)
    LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM(
	SELECT
	e."ID",
	e.compania,
	e.empresa,
	e.ruc
	FROM tm_empresa e
	INNER JOIN tm_compania c ON e.compania = c."ID"
	WHERE
	e.compania = comp
	AND
	e.estado   = TRUE
	)r;
END;
$function$

-- CREAR EMPRESA
CREATE OR REPLACE FUNCTION public.func_empresa_c(cmp integer, name character varying, r character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	INSERT INTO tm_empresa (compania,empresa, ruc, creacion, estado)
	VALUES (cmp,UPPER(name), r, now(),TRUE);
	
END;
$function$

-- ACTUALIZAR EMPRESA
CREATE OR REPLACE FUNCTION public.func_empresa_u(id integer, name character varying, r character varying)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_empresa
	SET empresa = UPPER(name),
		ruc 	= r
	WHERE
	"ID" = id;
END;
$function$

-- ELIMINAR EMPRESA
CREATE OR REPLACE FUNCTION public.func_empresa_d(id integer)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
	UPDATE tm_empresa
	SET estado = FALSE
	WHERE
	"ID" = id;
END;
$function$

