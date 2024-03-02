-- LISTAR PRODUCTO POR ID
CREATE OR REPLACE FUNCTION public.func_producto_r(code integer)
    RETURNS TABLE(result json)
    LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM(
		SELECT
		s.sucursal,
		p.producto,
		c.categoria,
		p.descripcion,
		p.medida,
		p.moneda,
		p.producto_compra,
		p.producto_venta,
		p.caducidad,
		p.stock
		FROM tm_producto p
		INNER JOIN tm_sucursal s  ON p.sucursal  = s."ID"
		INNER JOIN tm_categoria c ON p.categoria = c."ID"
		WHERE
		p."ID"   = code
		AND
		p.estado = TRUE
	)r;
END;
$function$

-- LISTAR PRODUCTO POR SUCURSAL
CREATE OR REPLACE FUNCTION public.func_producto_sucursal(suc integer)
    RETURNS TABLE(result json)
    LANGUAGE plpgsql
AS $function$
BEGIN
	RETURN QUERY
	SELECT ROW_TO_JSON(r)
	FROM (
		SELECT
		s.sucursal,
		p.producto,
		c.categoria,
		p.descripcion,
		p.medida,
		p.moneda,
		p.producto_compra,
		p.producto_venta,
		p.caducidad,
		p.stock
		FROM tm_producto p
		INNER JOIN tm_sucursal s 	ON p.sucursal  = s."ID"
		INNER JOIN tm_categoria c   ON p.categoria = c."ID"
		WHERE
		p.sucursal = suc
		AND
		p.estado   = TRUE
	)r;
END;
$function$

-- CREAR PRODUCTO
CREATE OR REPLACE FUNCTION public.func_producto_c(sucursal integer, categoria integer, producto character varying, descripcion text, medida medida_enum, moneda moneda_enum, producto_compra numeric, producto_venta numeric, stock stock_enum, caducidad date, imagen text)
    RETURNS integer
    LANGUAGE plpgsql
AS $function$
BEGIN
    INSERT INTO public.tm_producto (
        sucursal,
        categoria,
        producto,
        descripcion,
        medida,
        moneda,
        producto_compra,
        producto_venta,
        stock,
        caducidad,
        imagen,
        creacion,
        estado
    )
    VALUES (
        sucursal,
        categoria,
        producto,
        descripcion,
        medida,
        moneda,
        producto_compra,
        producto_venta,
        stock,
        caducidad,
        imagen,
        now(),
        TRUE
    );

    RETURN LASTVAL();
END;
$function$

-- ACTUALIZAR PRODUCTO
CREATE OR REPLACE FUNCTION public.func_producto_u(id integer, suc integer, cat integer, prod character varying, descri text, med medida_enum, mon moneda_enum, compra numeric, venta numeric, stk stock_enum, caduce date, img text)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
    UPDATE public.tm_producto
    SET
        sucursal 		= suc,
        categoria 		= cat,
        producto 		= upper(prod),
        descripcion 	= descri,
        medida 			= med,
        moneda 			= mon,
        producto_compra = compra,
        producto_venta  = venta,
        stock 			= stk,
        caducidad 		= caduce,
        imagen 			= img
    WHERE
        "ID" 		= id
    AND
    	estado 		= TRUE;
END;
$function$

-- ELIMINAR PRODUCTO
CREATE OR REPLACE FUNCTION public.func_producto_d(id integer)
    RETURNS void
    LANGUAGE plpgsql
AS $function$
BEGIN
    UPDATE tm_producto SET estado = FALSE
    WHERE
    "ID" = id;
END;
$function$

